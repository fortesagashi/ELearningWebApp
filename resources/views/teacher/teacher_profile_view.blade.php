@extends('teacher.teacher_master')
@section('teacher_profile_view')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <br><br>
                <center>
                     <img src="{{ (!empty($teacherData->photo))? url('upload/teacher_images/'.$teacherData->photo):url('upload/no_image.png')}}" alt="Fotoja e profilit" class="rounded-circle avatar-xl">
                </center>
                     <div class="card-body">

                        <p class="card-text">Emri : {{$teacherData->name}}</p>
                        <hr>
                        <p class="card-text">Emaili : {{$teacherData->email}}</p>
                        <hr>
                        <p class="card-text">Emri i përdoruesit : {{$teacherData->username}}</p>
                        <hr>
                        <a href="{{route('teacher.edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light">Ndrysho të dhënat</a>
                   </div>
            </div>
            </div>
        </div>
    </div>



@endsection
