<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <div class="main-menu-header">
        <input type="text" placeholder="Search" id="menu_search" class="menu-search form-control round" />
    </div>
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Dashboard',
                    'icon' => 'icon-home3',
                    'route' => 'admin.dashboard',
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Users',
                    'icon' => 'icon-person-stalker',
                    'route' => 'admin.users.index',
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Projects',
                    'icon' => 'icon-social-codepen-outline',
                    'route' => 'admin.projects.index',
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Posts',
                    'icon' => 'icon-news',
                    'route' => 'admin.posts.index',
                    'subRoute' => 'admin.posts.type',
                    'sub' => json_decode(json_encode($postTypes), true),
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Statistics',
                    'icon' => 'icon-stats-bars',
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Settings',
                    'icon' => 'icon-settings',
                    'subRoute' => 'admin.posts.show',
                    'sub' => [
                        ['id' => 'post', 'name' => 'Post'],
                        ['id' => 'project', 'name' => 'Project'],
                        ['id' => 'level', 'name' => 'Level'],
                    ],
                    'disabled' => true,
                ]
            )
        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>
<!-- / main menu-->