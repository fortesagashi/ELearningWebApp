@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Të gjitha lëndët</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Të gjitha të dhënat </h4>
                    </br>

                <a href="{{ route('add.subjects') }}" class="btn btn-info sm" title="Shto një lëndë"><i class="ri-menu-add-fill"></i>&nbsp;&nbsp;Shto një lëndë</a>

                </br></br>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Emri i lëndës</th>
                            <th>Viti i lëndës</th>
                            <th></th>

                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($subjects as $item)
                        <tr>
                            <td> {{ $i++}} </td>
                            <td> {{ $item->subject_name }} </td>
                            <td> {{ $item->study_year }} </td>

                            <td>
                            <a href="{{ route('edit.subjects',$item->id) }}" class="btn btn-info sm" title="Ndrysho lëndën">  <i class="fas fa-edit"></i> </a>

                            <a href="{{ route('delete.subjects',$item->id) }}" class="btn btn-danger sm" title="Fshij lëndën" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection
