session_start();
@extends('student.student_master')
@section('chapter_content')
<p>Faqja Index</p>
@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif
@php
$chapter_name = $_GET['chapter_name'];
$chapter_id = $_GET['chapter_id'];
$chapter_content = $_GET['chapter_content'];

@endphp
<main id="main" class="main">
    <div class="pagetitle">
            <h1><a href="#">Lëndët</a></h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Kapitulli {{$chapter_id}} </a></li>
                  <li class="breadcrumb-item active"><a href="#">{{$chapter_name}} </a></li>
               </ol>
            </nav>
    </div>
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$chapter_name}}</h5>
              {{$chapter_content}}
              </div>
          </div>
</main>

@endsection

