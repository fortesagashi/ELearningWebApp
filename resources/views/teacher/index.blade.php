@extends('teacher.teacher_master')
@section('teacher')
@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->

        <!-- end page title -->

        <!-- end row -->




        <!-- end row -->
    </div>
</div>
@endsection

