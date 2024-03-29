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
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                        <div class="card-header no-border pb-0">
                            <div class="card-title text-xs-center">
                                <img src="storage/images/logo/logo-dark.png" alt="branding logo">
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>We
                                    will send you a link to reset your password.</span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal" method="POST" action="{{route('password.email')}}" novalidate>
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input name="email" type="email" class="form-control form-control-lg input-lg"
                                            id="user-email" placeholder="Your Email Address" required>
                                        <div class="form-control-position">
                                            <i class="icon-mail6"></i>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                            class="icon-lock4"></i> Recover Password</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer no-border">
                            <p class="float-sm-left text-xs-center"><a href="{{route('login')}}"
                                    class="card-link">Login</a></p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection