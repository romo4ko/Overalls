<header>
  <nav class="navbar navbar-expand-lg bg-primary border-bottom border-body" data-bs-theme="primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Overalls</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Main</a>
        </li>
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Manage
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/workshops">Workshops</a></li>
              <li><a class="dropdown-item" href="/employers">Employers</a></li>
              <li><a class="dropdown-item" href="/overalls">Overalls</a></li>
              <li><a class="dropdown-item" href="/receiving">Receiving</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/queries">Queries</a></li>
            </ul>
          </li>
        @endauth
        <li class="nav-item">
        @guest
          <a class="nav-link" href="/login">Login</a>
        @endguest
        @auth
          <a class="nav-link" href="/logout">Logout</a>
        @endauth
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
</header>