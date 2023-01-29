@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ndrysho fjalëkalimin</h4><br>
                        @if(count($errors))
                            @foreach($errors->all() as $error)
                            <p class="alert alert-secondary alert-dismissible fade show">{{$error}}</p>

                            @endforeach
                        @endif
                        <form method="post" action="{{route('admin.update.password')}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Fjalëkalimi i vjetër</label>
                                <div class="col-sm-10">
                                    <input name="oldpassword" class="form-control" type="password" value="" id="oldpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Fjalëkalimi i ri</label>
                                <div class="col-sm-10">
                                    <input name="newpassword" class="form-control" type="password" value="" id="newpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Konfirmo fjalëkalimin</label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" class="form-control" type="password" value="" id="confirm_password">
                                </div>
                            </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Ndrysho fjalëkalimin">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
