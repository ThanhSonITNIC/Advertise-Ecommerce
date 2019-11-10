<!--::header part start::-->
<header class="main_menu home_menu shadow">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href=""> <img src="storage/images/logo/logo-dark.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('guest.home')}}">@lang('Home')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('guest.about')}}">@lang('About us')</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-click" href="{{route('guest.projects')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @lang('Project')
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($projectTypes as $type)
                                        <a class="dropdown-item" href="{{route('guest.projects.type', $type->id)}}">@lang($type->name)</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('guest.news')}}">@lang('News')</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('guest.policies')}}">@lang('Policy')</a>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('guest.contact')}}">@lang('Contact')</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->