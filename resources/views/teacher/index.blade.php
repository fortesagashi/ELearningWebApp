@extends('teacher.teacher_master')
@section('teacher')
<p>Faqja Index</p>
@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif

<h4>Përshëndetje {{ Auth::guard('teacher')->user()->name}}</h4>
<a href="{{route('teacher.logout')}}">Shkyqu</a>
@endsection

