@extends('student.student_master')
@section('student')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <br><br>
                <center>
                     <img src="{{ (!empty($studentData->photo))? url('upload/student_images/'.$studentData->photo):url('upload/no_image.png')}}" alt="Fotoja e profilit" class="rounded-circle avatar-xl">
                </center>
                     <div class="card-body">

                        <p class="card-text">Emri : {{$studentData->name}}</p>
                        <hr>
                        <p class="card-text">Emaili : {{$studentData->email}}</p>
                        <hr>
                        <p class="card-text">Emri i përdoruesit : {{$studentData->username}}</p>
                        <hr>
                        <a href="{{route('student.edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light">Ndrysho të dhënat</a>
                   </div>
            </div>
            </div>
        </div>
    </div>



@endsection
