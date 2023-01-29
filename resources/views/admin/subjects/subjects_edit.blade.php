@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Ndrysho të dhënat e lëndës </h4>

            <form method="post" action="{{ route('update.subjects') }}" enctype="multipart/form-data">
                @csrf

               <input type="hidden" name="id" value="{{  $subjects->id }}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Emri i lëndës</label>
                <div class="col-sm-10">
                    <input name="subject_name" class="form-control" type="text" value="{{ $subjects->subject_name }}" id="example-text-input">
                    @error('subject_name')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Viti i lëndës </label>
                <div class="col-sm-10">
                    <input name="study_year" class="form-control" type="text" value="{{ $subjects->study_year }}" id="example-text-input">

                    @error('study_year')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <!-- end row -->

<input type="submit" class="btn btn-info waves-effect waves-light" value="Ndrysho të dhënat e lëndës">
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
