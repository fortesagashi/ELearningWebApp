@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Ndrysho të dhënat e studentit</h4>
</br>
            <form method="post" action="{{ route('update.students') }}" enctype="multipart/form-data">
                @csrf

               <input type="hidden" name="id" value="{{  $student->id }}">

               <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Emri</label>
                <div class="col-sm-10">
                    <input name="name" class="form-control" type="text" id="example-text-input" value="{{ $student->name}}">
                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Mbiemri</label>
                <div class="col-sm-10">
                    <input name="lastname" class="form-control" type="text" id="example-text-input" value="{{ $student->lastname }}">
                    @error('lastname')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">ID e studentit</label>
                <div class="col-sm-10">
                    <input name="student_id" class="form-control" type="text" id="example-text-input" value="{{ $student->student_id }}">
                    @error('student_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">ID personale</label>
                <div class="col-sm-10">
                    <input name="personal_id" class="form-control" type="text" id="example-text-input" value="{{ $student->personal_id }}">
                    @error('personal_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Datëlindja</label>
                <div class="col-sm-10">
                    <input name="date_of_birth" class="form-control" type="date" id="example-text-input" value="{{ $student->date_of_birth }}">
                    @error('date_of_birth')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Numri i telefonit</label>
                <div class="col-sm-10">
                    <input name="parent_phone_number" class="form-control" type="text" id="example-text-input" value="{{ $student->parent_phone_number }}">
                    @error('parent_phone_number')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Klasa</label>
                <div class="col-sm-10">
                    <input name="study_year" class="form-control" type="text" id="example-text-input" value="{{ $student->study_year }}">
                    @error('study_year')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Paralelja</label>
                <div class="col-sm-10">
                    <input name="class_identifier" class="form-control" type="text" id="example-text-input" value="{{ $student->class_identifier }}">
                    @error('class_identifier')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Emri i përdoruesit</label>
                <div class="col-sm-10">
                    <input name="username" class="form-control" type="text" id="example-text-input" value="{{ $student->username }}">
                    @error('username')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="email" id="example-text-input" value="{{ $student->email }}">
                    @error('email')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Foto e profilit </label>
                <div class="col-sm-10">
           <input name="photo" class="form-control" type="file" id="image" value="{{ $student->photo }}">
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
  <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($student->photo))? url('upload/student_images/'.$student->photo):url('upload/no_image.png')}}" alt="Card image cap">
                </div>
            </div>
            <!-- end row -->
<input type="submit" class="btn btn-info waves-effect waves-light" value="Ndrysho të dhënat e studentit">
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
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
