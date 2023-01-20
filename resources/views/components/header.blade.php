

<nav class="navbar navbar-expand-lg " style="background-color:white; border:  solid black; ">
  <div class="container-fluid">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/about-us">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Contact</a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('event_list')}}">EvenementenLijst</a>
        </li>
        @if (Auth::user())
        @if (Auth::user()->is_admin)
          <li class="nav-item">
            <a class ="nav-link" href="{{ Route ('admin')}}">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ Route('event')}}">Events</a>
          </li>
        @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ Route('view-tickets')}}">Tickets</a>
          </li>
          
        @else 
        @endif
      </ul> 
      <ul class="navbar-nav">
      @if (Auth::user())
      <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">
                  @csrf
                  <button class="nav-link uitlogknop" type="submit">Uitloggen</button>
                </form>
          </li> 
      @else
        <li class="nav-item" id="loginstyle" >
          <a class = "nav-link" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item" id="registerstyle">
          <a class="nav-link" id="regtext" href="{{route('register')}}">Register</a>
        </li>
      @endif
      </ul>  
    </div>
  </div>
</nav>


