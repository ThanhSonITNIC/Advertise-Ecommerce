@extends('auth.main')

@section('title')
@lang('Reset password')
@endsection

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
                                <div class="p-1"><img src="storage/images/logo/logo-dark.png"
                                        alt="branding logo"></div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                <span>Reset password</span></h6>
                        </div>
                        @include('admin.layouts.alert')
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal form-simple" method="POST" action="{{route('password.update')}}" novalidate>
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" name="email" class="form-control form-control-lg input-lg"
                                            id="user-name" placeholder="Your Email" value="{{ $email ?? old('email') }}" required>
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control form-control-lg input-lg"
                                            placeholder="Enter Password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg input-lg"
                                            placeholder="Confirm Password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                            class="icon-unlock2"></i> Reset</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <p class="float-sm-left text-xs-center m-0"><a href="{{route('password.update')}}"
                                        class="card-link">Recover password</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection