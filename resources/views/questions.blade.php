@extends ('layouts')
@section('home')
    <div class="row" style="padding:10vh;">
        <div class="col-md-4">
            <form action="/questions" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="questions" placeholder="Question" required=""></textarea>
                </div>
                <div class="form-group">
                    <input placeholder="Option A" name="a" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                    <input placeholder="Option B" name="b" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                    <input placeholder="Option C" name="c" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <select class="form-control" name="answer" required="">
                        <option value="">Choose Correct Option</option>
                        <option value="a">Option A</option>
                        <option value="b">Option B</option>
                        <option value="c">Option C</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Question</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            @if(count($questions))	
                <div class="panel-body" style="padding:0px">
                    <div class="table-responsive dropsection">
                        <table id="table-ext-3" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>Question</th>
                                <th>Option</th>
                                <th>Answer</th>
                                <th></th>
                            </tr>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{ $question->questions }}</td>
                                    <td>
                                        {{ $question->a }} <br> {{ $question->b }} <br> {{ $question->c }}
                                    </td>
                                    <td>{{ $question->answer }}</td>
                                    <td><a href="/delete/{{$question->id}}" class="btn btn-warning">Delete</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @else
                <div class="panel-body" style="padding:10vh 0">
                    <h3 class="text-center" style="color:#ddd"> You Haven't Added Any Question.</h3>
                </div>
            @endif
        </div>
    </div>
@endsection('homxe')
@section('footer')
    <script type="text/javascript">
        @if ($flash = session('message'))
            toastr.info("{{$flash}}");
        @endif
    </script>
@endsection('footer')