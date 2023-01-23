@extends('student.student_master')
@section('student')
<p>Faqja Index</p>
@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif

<main id="main" class="main">
    <div class="pagetitle">
            <h1>Lëndët</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Lënda</a></li>
                  <li class="breadcrumb-item active">Kapitulli</li>
               </ol>
            </nav>
    </div>
</main>
@endsection

