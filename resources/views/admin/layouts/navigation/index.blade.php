<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <div class="main-menu-header">
        <input type="text" placeholder="@lang('Search')" id="menu_search" class="menu-search form-control round" />
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
                    'subRoute' => 'admin.projects.type',
                    'sub' => json_decode(json_encode($projectTypes), true),
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
                    'title' => 'Materials',
                    'icon' => 'icon-ios-pie',
                    'route' => 'admin.materials.index',
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Imports',
                    'icon' => 'icon-archive',
                    'route' => 'admin.import-materials.index',
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Statistics',
                    'icon' => 'icon-stats-bars',
                    'disabled' => true,
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Setups',
                    'icon' => 'icon-settings',
                    'sub' => [
                        ['id' => 'admin.units.index', 'name' => 'Units'],
                        ['id' => 'admin.project-types.index', 'name' => 'Project types'],
                        ['id' => 'admin.post-types.index', 'name' => 'Post types'],
                        ['id' => 'admin.levels.index', 'name' => 'Levels'],
                        ['id' => 'admin.user-statuses.index', 'name' => 'User statuses'],
                    ],
                ]
            )
            @include(
                'admin.layouts.navigation.item',
                [
                    'title' => 'Settings',
                    'icon' => 'icon-android-settings',
                    'sub' => [
                        ['id' => 'admin.configures.logo', 'name' => 'Logo'],
                        ['id' => 'admin.configures.banner', 'name' => 'Banner'],
                        ['id' => 'admin.configures.index', 'name' => 'Orthers'],
                    ],
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