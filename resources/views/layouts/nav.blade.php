<nav class="navbar navbar-toggleable-md navbar-inverse bg-info">
    <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{route('home')}}">Laravel Quiz</a>

    <div class="navbar-collapse collapse" id="navbarSupportedContent" aria-expanded="false" style="">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                @if(Auth::user()->role == 'admin')
                    <a class="nav-link" href="{{route('questions')}}">Questions</a>
                @endif
            </li>
        </ul>
        <a href="/logout" class="btn btn-sm btn-info">Logout</a>
    </div>
</nav>