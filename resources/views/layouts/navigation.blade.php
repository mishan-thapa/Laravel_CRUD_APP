
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel Project</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">Log Out</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>