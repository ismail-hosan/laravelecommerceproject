@extends('admin.admin_dashboard')

@section('title', 'All Banner')

@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sub category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sub category Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('admin.subcategory.add')}}" class="btn btn-primary">Add Subcategory</a>
                </div>
            </div>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Category Name</th>
                                <th>Sub Category name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($subcategorys as $key => $subcategory)  
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$subcategory['category']['category_name']}}</td>
                                <td>{{$subcategory->subcategory_name}}</td>
                                <td>
                                    <a href="{{route('admin.edit.subcategory',$subcategory->id)}}" class="btn btn-info">Edit</a>
                                    <a href="" id="delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SI</th>
                                <th>Category Name</th>
                                <th>Sub Category name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        @include('admin.alert')
    </div>
@endsection
