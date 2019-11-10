<!-- footer part start-->
<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1">
                    <a href=""> <img src="storage/images/logo/logo-dark.png" alt=""> </a>
                    <p>{{$configures['slogan'] ?? ''}} </p>
                    <p>{{$configures['description'] ?? ''}} </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_2">
                    <h4>@lang('Posts')</h4>
                    <ul class="list">
                        @foreach ($postTypes as $type)
                        <li><a href="{{route('guest.posts.type', $type->id)}}">@lang($type->name)</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-md-4">
                <div class="single-footer-widget footer_2">
                    <h4>@lang('Contact')</h4>
                    <div class="contact_info">
                        <p><span> @lang('Address') :</span> {{$configures['address'] ?? ''}} </p>
                        <p><span> @lang('Phone') :</span> {{$configures['tel'] ?? ''}}</p>
                        <p><span> @lang('Email') : </span>{{$configures['email'] ?? ''}} </p>
                    </div>
                    <div class="social_icon">
                        @if(isset($configures['facebook']))
                        <a target="_blank" href="{{$configures['facebook']}}"> <i class="ti-facebook"></i> </a>
                        @endif
                        @if(isset($configures['youtube']))
                        <a target="_blank" href="{{$configures['youtube']}}"> <i class="ti-youtube"></i> </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="footer-text m-0">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer part end-->