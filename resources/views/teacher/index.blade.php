@extends('teacher.teacher_master')
@section('teacher_index')

@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif

    <div class="pagetitle">
            <h1><a href="#">Lëndët</a></h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Kapitulli</a></li>
                  <li class="breadcrumb-item active"><a href="#"></a></li>
               </ol>
            </nav>
    </div>
    <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              </div>
          </div>


@endsection

