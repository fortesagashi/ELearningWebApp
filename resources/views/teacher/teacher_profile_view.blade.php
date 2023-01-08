@extends('teacher.teacher_master')
@section('teacher')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                    <center>
                    <img class="rounded-circle avatar-xl" src="{{ (!empty($teacherData->photo))? url('upload/teacher_images/'.$teacherData->photo):url('upload/no_image.png')}}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Emri : {{$teacherData->name}}</h4>
                        <hr>
                        <h4 class="card-title">Emaili : {{$teacherData->email}}</h4>
                        <hr>
                        <h4 class="card-title">Emri i përdoruesit : {{$teacherData->username}}</h4>
                        <hr>
                        <a href="{{route('edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light">Ndrysho të dhënat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
