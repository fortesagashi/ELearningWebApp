@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Shto nxënësin </h4>
            <form method="post" action="{{ route('store.students') }}" enctype="multipart/form-data">
                @csrf



            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Emri</label>
                <div class="col-sm-10">
                    <input name="name" class="form-control" type="text" id="example-text-input" value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Mbiemri</label>
                <div class="col-sm-10">
                    <input name="lastname" class="form-control" type="text" id="example-text-input" value="{{ old('lastname') }}">
                    @error('lastname')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">ID e studentit</label>
                <div class="col-sm-10">
                    <input name="student_id" class="form-control" type="text" id="example-text-input" value="{{ old('student_id') }}">
                    @error('student_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">ID personale</label>
                <div class="col-sm-10">
                    <input name="personal_id" class="form-control" type="text" id="example-text-input" value="{{ old('personal_id') }}">
                    @error('personal_id')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Datëlindja</label>
                <div class="col-sm-10">
                    <input name="date_of_birth" class="form-control" type="date" id="example-text-input" value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Gjinia</label>
                <div class="col-sm-10">
        <select name="gender" class="form-select" aria-label="Default select example">
            <option value="F">Femër</option>
            <option value="M">Mashkull</option>
            </select>
               </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Numri i telefonit</label>
                <div class="col-sm-10">
                    <input name="parent_phone_number" class="form-control" type="text" id="example-text-input" value="{{ old('parent_phone_number') }}">
                    @error('parent_phone_number')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Klasa</label>
                <div class="col-sm-10">
                    <input name="study_year" class="form-control" type="text" id="example-text-input" value="{{ old('study_year') }}">
                    @error('study_year')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Paralelja</label>
                <div class="col-sm-10">
                    <input name="class_identifier" class="form-control" type="text" id="example-text-input" value="{{ old('class_identifier') }}">
                    @error('class_identifier')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Emri i përdoruesit</label>
                <div class="col-sm-10">
                    <input name="username" class="form-control" type="text" id="example-text-input" value="{{ old('username') }}">
                    @error('username')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="email" id="example-text-input" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fjalëkalimi</label>
                <div class="col-sm-10">
                    <input name="password" class="form-control" type="password" id="example-text-input">
                    @error('password')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Konfirmo fjalëkalimin</label>
                <div class="col-sm-10">
                    <input name="password_confirmation" class="form-control" type="password" id="password_confirmation">
                    @error('password_confirmation')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Foto e profilit </label>
                <div class="col-sm-10">
           <input name="photo" class="form-control" type="file" id="image" value="{{ old('photo') }}">
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
  <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.png') }}" alt="Card image cap">
                </div>
            </div>
            <!-- end row -->
<input type="submit" class="btn btn-info waves-effect waves-light" value="Shto studentin">
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
