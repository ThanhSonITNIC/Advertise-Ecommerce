<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <div class="main-menu-header">
        <input type="text" placeholder="Search" id="menu_search" class="menu-search form-control round"/>
    </div>
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" nav-item"><a href="/admin"><i class="icon-home3"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('admin.users.index')}}"><i class="icon-person-stalker"></i><span data-i18n="nav.cards.main" class="menu-title">Users</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{route('admin.users.index')}}" data-i18n="nav.cards.card_bootstrap" class="menu-item">List</a>
                    </li>
                    <li>
                        <a href="{{route('admin.users.show', 1)}}" data-i18n="nav.cards.card_actions" class="menu-item">Show</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="{{route('admin.projects.index')}}"><i class="icon-social-codepen-outline"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Projects</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('admin.posts.index')}}"><i class="icon-news"></i><span data-i18n="nav.cards.main" class="menu-title">Posts</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{route('admin.posts.index')}}" data-i18n="nav.cards.card_bootstrap" class="menu-item">List</a>
                    </li>
                    <li>
                        <a href="{{route('admin.posts.show', 1)}}" data-i18n="nav.cards.card_actions" class="menu-item">Show</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="/admin/orders"><i class="icon-stats-bars"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Statistics</span></a>
            </li>
            <li class=" nav-item"><a href="/admin/settings"><i class="icon-settings"></i><span data-i18n="nav.cards.main" class="menu-title">Settings</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="/admin/settings/1" data-i18n="nav.cards.card_actions" class="menu-item">Show</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>
<!-- / main menu-->