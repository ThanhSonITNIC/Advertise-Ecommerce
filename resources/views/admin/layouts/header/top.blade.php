<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a>
                </li>
                <li class="nav-item"><a href="" class="navbar-brand nav-link"><img alt="branding logo"
                            src="storage/images/logo/logo-light.png"
                            data-expand="storage/images/logo/logo-light.png"
                            data-collapse="storage/images/logo/logo-small.png"
                            class="brand-logo"></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile"
                        class="nav-link open-navbar-container"><i
                            class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                                class="icon-menu5"> </i></a></li>
                </ul>
                <ul class="nav navbar-nav float-xs-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">
                            @switch(app()->getLocale())
                                @case('en')
                                    <i class="flag-icon flag-icon-gb"></i>
                                    <span class="selected-language">English</span>        
                                    @break
                                @case('vi')
                                    <i class="flag-icon flag-icon-vn"></i>
                                    <span class="selected-language">Vietnamese</span>
                                    @break
                                @default
                                    
                            @endswitch
                            
                        </a>
                        <div aria-labelledby="dropdown-flag" class="dropdown-menu">
                            <a href="{{route('configures.language', 'en')}}" class="dropdown-item"><i class="flag-icon flag-icon-gb"></i> English</a>
                            <a href="{{route('configures.language', 'vi')}}" class="dropdown-item"><i class="flag-icon flag-icon-vn"></i> Vietnamese</a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link pt-2">
                            <span>
                                <i class="icon-head"></i>
                            </span>
                            <span class="user-name">{{auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{route('admin.users.show', auth()->id())}}" class="dropdown-item"><i class="icon-head"></i> @lang('Profile')</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('logout')}}" class="dropdown-item">
                                <i class="icon-power3"></i> @lang('Logout')
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>