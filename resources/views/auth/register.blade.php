@extends('auth.main')

@section('body')
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1"><img src="admin_assets/app-assets/images/logo/robust-logo-dark.png"
                                        alt="branding logo"></div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                <span>Register with {{ config('app.name') }}</span></h6>
                        </div>
                        @include('admin.layouts.alert')
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal form-simple" method="POST" action="{{route('register')}}" novalidate>
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control form-control-lg input-lg"
                                            placeholder="Your name" required>
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-lg input-lg"
                                            placeholder="Your email" required>
                                        <div class="form-control-position">
                                            <i class="icon-ios-email-outline"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control form-control-lg input-lg"
                                            placeholder="Your password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg input-lg"
                                            placeholder="Confirm password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                            class="icon-check"></i> Register</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <p class="float-sm-left text-xs-center m-0"><a href="{{route('login')}}"
                                        class="card-link">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection