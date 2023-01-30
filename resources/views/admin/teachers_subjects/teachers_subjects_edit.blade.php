@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
        </br>
            <h4 class="card-title">Ndrysho të dhënat e lëndës </h4>

            <form method="post" action="{{ route('update.teachers_subjects') }}" enctype="multipart/form-data">
                @csrf
</br>
               <input type="hidden" name="id" value="{{  $books->id }}">
               <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Emri i lëndës</label>
                        <div class="col-sm-10">
                            <select name="subject_id" class="form-select" aria-label="Default select example">
                                @foreach($subjects as $sub)
                                <option selected=""></option>
                            <option value="{{ $sub->id }}" {{ $sub->id == $books->subject_id ? 'selected' : '' }} >{{ $sub->subject_name }} - {{ $sub->study_year }}</option>
                            @endforeach
                            </select>
                        </div>
                </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Emri i librit</label>
                <div class="col-sm-10">
                <select name="book_name" class="form-select" aria-label="Default select example">
                    <option value="Student">Nxënës</option>
                    <option value="Teacher">Mësues</option>
                    </select>
                    </div>
                    </div>
                    <!-- end row -->
</br>

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
