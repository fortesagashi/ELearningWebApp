@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Të gjithë studentët</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Të dhënat e studentëve </h4>
</br>
                    <a href="{{ route('add.students') }}" class="btn btn-info sm" title="Shto një nxënës"><i class="ri-user-add-fill"></i>&nbsp;&nbsp;Shto një student</a>
</br></br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Emri</th>
                            <th>Mbiemri</th>
                            <th>ID e studentit</th>
                            <th>Nr. tel</th>
                            <th>Klasa</th>
                            <th>Paralelja</th>
                            <th>Email</th>
                            <th>Modifiko</th>
                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($student as $item)
                        <tr>
                            <td> {{ $i++}} </td>
                            <td> {{ $item->name}} </td>
                            <td> {{ $item->lastname}} </td>
                            <td> {{ $item->student_id}} </td>
                            <td> {{ $item->parent_phone_number}} </td>
                            <td> {{ $item->study_year}} </td>
                            <td> {{ $item->class_identifier}} </td>
                            <td> {{ $item->email}} </td>
                            <td>
                            <a href="{{ route('edit.students',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                            <a href="{{ route('delete.students',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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
