<nav id="navheader" class="row">
    <div class="col-4">
        <img src="/assets/img/Logo.png" alt="" srcset="">
        <h1>Virtual<span>Educ</span></h1>
    </div>
    <div class="col-4 group">
        <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon">
            <g>
                <path
                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                </path>
            </g>
        </svg>

        <input id="query" class="input" type="search" placeholder="Search..." name="searchbar" />
    </div>
    <div class="col-4 justify-content-end pe-5">
        <div id="vermais" class="row bor-info bor rounded-4 dropdown dropdown-toggle position-absolute">
            <div class="col p-0 bor-end bor-info">
                <img src="/assets/img/svgs/person-circle.svg" style="width: 4vh" alt="" srcset="">
            </div>
            <div class="col d-flex flex-column align-items-center justify-content-center p-0 mx-3"
                data-bs-toggle="dropdown" aria-expanded="false">
                <div class="row">
                    <h5 class="subtitle text-center mb-0">{{ Auth::user()->nomeusu }}</h5>
                </div>
                <div class="row d-flex flex-row align-items-center justify-content-center">
                    <p class="paragraph m-0 text-center">
                        ver mais
                        <img src="/assets/img/svgs/chevron-down.svg" class="m-0" style="width: 2vh;">
                    </p>
                </div>
            </div>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        {{-- <div id="links" class="me-2">
            <a class="btn btn-virtual" href="{{ route('logout') }}" role="button">Logout</a>
        </div> --}}
    </div>
</nav>
