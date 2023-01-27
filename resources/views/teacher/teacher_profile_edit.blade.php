@extends('teacher.teacher_master')
@section('teacher_profile_edit')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content" style="padding-top:10px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ndrysho të dhënat e profilit</h4>
                        <br>
                        <form method="post" action="{{route('teacher.store.profile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Emri</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{$editData->name}}" id="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Emaili</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="text" value="{{$editData->email}}" id="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Emri i përdoruesit</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" value="{{$editData->username}}" id="username">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Fotoja e profilit</label>
                                <div class="col-sm-10">
                                    <input name="photo" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editData->photo))? url('upload/teacher_images/'.$editData->photo):url('upload/no_image.png')}}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Ndrysho të dhënat">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
