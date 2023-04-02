<header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="{{ route('welcome') }}" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <img
                 src="{{ URL::asset('db_logo.png') }}"
                 width="64"
                 height="64"
                 alt="Информационная база данных производства"/></a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            @guest
                <x-header.guest/>
            @else
                <x-header.signUser/>
            @endguest
          </ul>
        </div>
      </div>
    </div>
  </header>
