@extends('admin.admin_dashboard')

@section('title', 'All Banner')

@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Banner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Banner Table<span class="badge rounded-pill bg-danger">{{ count($categorys) }}</span></li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('admin.category.add')}}" class="btn btn-primary">Add Category</a>
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
                                <th>Category Slug</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($categorys as $key => $category)  
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_slug}}</td>
                                <td>
                                    <img src="{{ asset( $category->category_image ) }}" style="width: 70px; height:40x;" alt="">
                                </td>
                                <td>
                                    <a href="{{route('admin.edit.category',$category->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('admin.delete.category',$category->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SI</th>
                                <th>Banner Title</th>
                                <th>Banner Url</th>
                                <th>Banner Image</th>
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
