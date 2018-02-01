@extends ('layouts')
@section('home')
    <div class="row" style="padding:10vh;">
        <div class="col-md-4">
            <form action="/adduser" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input placeholder="Fullname" name="name" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                    <input placeholder="Username" name="username" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                    <input placeholder="Email" name="email" type="email" class="form-control" required="">
                </div>
                <div class="form-group">
                    <input placeholder="Password" name="password" type="password" class="form-control" required="">
                </div>
                <div class="form-group">
                    <input name="file" type="file" class="form-control" required="">
                </div>
                <div class="form-group">
                    <select class="form-control" name="gender" required="">
                        <option value="">Choose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add User</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            @if(count($users))	
                <div class="panel-body" style="padding:0px">
                    <div class="table-responsive dropsection">
                        <table id="table-ext-3" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <!-- <th>Action</th> -->
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td><img src="/images/{{$user->avatar}}" alt="{{$user->username}}" class="avatar"></a></td>
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <!-- <td></td> -->
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @else
                <div class="panel-body" style="padding:10vh 0">
                    <h3 class="text-center" style="color:#ddd"> You Haven't Added Any User.</h3>
                </div>
            @endif
        </div>
    </div>
@endsection('home')
@section('footer')
    <script type="text/javascript">
        @if ($flash = session('message'))
            toastr.info("{{$flash}}");
        @endif
    </script>
@endsection('footer')