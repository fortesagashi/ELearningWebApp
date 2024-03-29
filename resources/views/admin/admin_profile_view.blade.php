@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card"><br><br>
                    <center>
                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($adminData->photo))? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.png')}}" alt="Card image cap">
                                </center>
                    <div class="card-body">
                        <h4 class="card-title">Emri : {{$adminData->name}}</h4>
                        <hr>
                        <h4 class="card-title">Emaili : {{$adminData->email}}</h4>
                        <hr>
                        <h4 class="card-title">Emri i përdoruesit : {{$adminData->username}}</h4>
                        <hr>
                        <a href="{{route('edit.profile')}}" class="btn btn-info btn-rounded waves-effect waves-light">Ndrysho të dhënat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
