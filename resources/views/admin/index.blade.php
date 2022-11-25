@extends('admin.admin_master')
@section('admin')
<p>Faqja Index</p>
@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif

<h4>Përshëndetje {{ Auth::guard('admin')->user()->name}}</h4>
<a href="{{route('admin.logout')}}">Shkyqu</a>
@endsection
