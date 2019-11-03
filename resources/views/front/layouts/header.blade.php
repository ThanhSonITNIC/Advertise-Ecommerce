<!--::header part start::-->
<header class="main_menu home_menu shadow">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"> <img src="/front_assets/img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('guest.home')}}">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('guest.about')}}">Giới thiệu</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{route('guest.projects')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dự án
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($projectTypes as $type)
                                        <a class="dropdown-item" href="{{route('guest.projects.type', $type->id)}}">{{$type->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('guest.news')}}">Tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('guest.contact')}}">Liên hệ</a>
                            </li>
                            {{-- <li class="d-none d-lg-block">
                                <a class="btn_1" href="#"><i class="ti-search"></i></a>
                            </li> --}}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->