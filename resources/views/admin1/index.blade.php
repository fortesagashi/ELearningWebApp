@extends('admin.admin_master')
@section('admin')
@if(Session::has('error'))
    <strong> {{ session::get('error') }}</strong>
@endif
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Nxënësit</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                        </div>

                        <h4 class="card-title mb-4">Lista e Nxënësve</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Emri dhe mbiemri</th>
                                        <th>ID</th>
                                        <th>Emaili</th>
                                        <th>Klasa</th>
                                        <th>Paralelja</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    <tr>
                                        <td><h6 class="mb-0">Emri</h6></td>
                                        <td>2025555</td>
                                        <td>test@gmail.com</td>
                                        <td>8</td>
                                        <td>1</td>
                                    </tr>
                                        <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
@endsection

