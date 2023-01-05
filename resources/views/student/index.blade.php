@extends('student.student_master')
@section('student')
<p>Faqja Index</p>
@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif

<h4>Përshëndetje {{ Auth::guard('student')->user()->name}}</h4>
<a href="{{route('student.logout')}}">Shkyqu</a>
@endsection

