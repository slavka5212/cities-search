<header class="blog-header py-3">

    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white">
        <a class="blog-header-logo navbar-brand p-2" href="{{ url('/') }}">
            <img class="blog-header-logo" src="/img/logo.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                
            <div class="navbar-nav">
                <a class="nav-item nav-link h-100 align-bottom" href="#">O nás</a>
                <a class="nav-item nav-link align-bottom" href="{{ url('/city', ['city' => 'Zvolen'])}}">Zoznam miest</a>
                <a class="nav-item nav-link align-bottom" href="#">Inšpekcia</a>
                <a class="nav-item nav-link align-bottom" href="#">Kontakt</a>
            </div>
            
            <form class="form-inline mt-2">
            <div class="input-group py-2 pr-2">
                <input class="form-control border-right-0" type="search" value="">
                <span class="input-group-append">
                    <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                </span>
            </div>
            <div class="col-md-2 flex-row-reverse p-0">
                <a class="login-button btn btn-dm" href="#">Prihlásenie</a>
            </div>
        </form>
        </div>
    </nav>
</header>