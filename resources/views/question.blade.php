@extends ('layouts')
@section('home')
    <div class="row" style="padding:10vh;">
        @if ($flash = session('score'))
            <div class="col-md-8" style="text-align:center;">
                <h1>{{$flash}}<h1>
            </div>
        @else
            <div class="col-md-8">
                @if(count($questions))	
                    <div class="panel-body" style="padding:0px">
                        <form action="/answer" method="POST">
                            {{ csrf_field() }}
                            @foreach($questions as $question)
                                <div class="form-group">
                                    <p>{{ $question->questions }}<p>
                                    <input type="radio" name="answer['{{ $question->id }}']" id="{{ $question->id }}" value="a" />
                                    <label for="question-{{ $question->id }}"> {{ $question->a }} </label><br>
                                    <input type="radio" name="answer['{{ $question->id }}']" value="b" />
                                    <label for="question-{{ $question->id }}"> {{ $question->b }} </label><br>
                                    <input type="radio" name="answer['{{ $question->id }}']" value="c" />
                                    <label for="question-{{ $question->id }}"> {{ $question->c }} </label>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="panel-body" style="padding:10vh 0">
                        <h3 class="text-center" style="color:#ddd"> No Questions Yet.</h3>
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection('homxe')
@section('footer')
    <script type="text/javascript">
        @if ($flash = session('score'))
            toastr.info("{{$flash}}");
        @endif
    </script>
@endsection('footer')