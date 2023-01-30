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
            <h4 class="card-title">Shto një lëndë </h4>

            <form method="post" action="{{ route('store.teachers_subjects', ['id' => $teacher_id]) }}" enctype="multipart/form-data">
                @csrf
</br>
<p>{{$teacher_id}}</p>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Emri i lëndës</label>
                        <div class="col-sm-10">
                            <select name="subject_id" class="form-select" aria-label="Default select example">
                                <option selected="">Selekto lëndën</option>
                                @foreach($subjects as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->subject_name }} - {{ $sub->study_year }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
            <!-- end row -->
</br>

<input type="submit" class="btn btn-info waves-effect waves-light" value="Shto lëndën">
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
