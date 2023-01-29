@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Të gjithë librat</h4>
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

                <a href="{{ route('add.books') }}" class="btn btn-info sm" title="Shto një libër"><i class="ri-menu-add-fill"></i>&nbsp;&nbsp;Shto një libër</a>
                </br></br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Emri i lëndës</th>
                            <th>Emri i librit</th>
                            <th>Viti i studimit</th>
                            <th></th>

                        </thead>


                        <tbody>
                        	@php($i = 1)
                        	@foreach($books as $item)
                        <tr>
                            <td> {{ $i++}} </td>
                            <td> {{ $item->subject_name }} </td>
                            <td> @if($item->book_name == 'Student')
                                Nxënës
                            @elseif($item->book_name == 'Teacher')
                                Mësues
                            @else
                                {{ $item->book_name }}
                            @endif </td>
                            <td> {{ $item->study_year }} </td>

                            <td>
                            <a href="{{ route('edit.books',$item->id) }}" class="btn btn-info sm" title="Ndrysho lëndën">  <i class="fas fa-edit"></i> </a>

                            <a href="{{ route('delete.books',$item->id) }}" class="btn btn-danger sm" title="Fshij lëndën" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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
