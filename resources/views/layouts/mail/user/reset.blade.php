@extends('layouts.mail.main')

@section('content')
    Click <a href="{{route($route, $token).'?email='.urlencode($email)}}">HERE</a> to reset your password!
@endsection