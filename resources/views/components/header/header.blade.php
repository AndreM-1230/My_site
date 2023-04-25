<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <a href="{{ route('welcome') }}" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
        <img
             src="{{ URL::asset('db_logo.png') }}"
             width="64"
             height="64"
             alt="Информационная база данных производства"/></a>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @guest
              <x-header.guest/>
          @else
              <x-header.signUser/>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Background image -->
  @if (Route::current()->getName() === 'welcome')
  <div
    class="p-5 text-center bg-image"
    style="
      background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
      height: 300px;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          @auth
          <h1 class="mb-3">Вы вошли как {{ Auth::user()->nickname }}</h1>
          <h4 class="mb-3"></h4>
          @endauth
          <a class="btn btn-outline-light btn-lg" href="#!" role="button"
          >Call to action</a
          >
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- Background image -->
</header>
