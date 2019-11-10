{{-- 
    $route : route name index. route($route)
    $icon : icon class
    $subRoute : route name sub items. route($subRoute, id)
    $sub : [['id'=>'', 'name'=>''],...] : if $subRoute not set then id is route
    $title
    $disabled : any value = true. default false
    $tag
--}}

<li class="{{isset($disabled) ? 'disabled' : null}} nav-item">
    <a href="{{isset($route) ? route($route) : null}}">
        <i class="{{$icon}}"></i>
        <span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">{{__($title)}}</span>
        @if (isset($tag))
            <span class="tag tag tag-primary tag-pill float-xs-right mr-2">{{$tag}}</span>
        @endif
    </a>
    @if(isset($sub) && isset($subRoute))
    <ul class="menu-content">
        @foreach ($sub as $item)
        <li>
            <a href="{{route($subRoute, $item['id'])}}" data-i18n="nav.cards.card_bootstrap" class="menu-item">
                {{__($item['name'])}}
            </a>
        </li>
        @endforeach
    </ul>
    @elseif(isset($sub))
    <ul class="menu-content">
        @foreach ($sub as $item)
        <li>
            <a href="{{route($item['id'])}}" data-i18n="nav.cards.card_bootstrap" class="menu-item">
                {{__($item['name'])}}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</li>