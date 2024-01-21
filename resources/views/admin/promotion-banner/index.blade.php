@extends('admin.admin_dashboard')

@section('title', 'All Promotion Banner')

@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Promotion Banner</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Promotion Banner</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.pbanner.add') }}" class="btn btn-primary">Add Promotion Banner</a>
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
                                <th>Promtion Banner Name</th>
                                <th>Main Image</th>
                                <th>Discount Image</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pbanners as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->pbanner_name }}</td>
                                <td>
                                    <img src="{{ asset( $item->pbanner_m_image ) }}" style="width: 70px; height:40x;" alt="">
                                </td>
                                <td>
                                    <img src="{{ asset( $item->pbanner_d_image ) }}" style="width: 40px; height:40x;" alt="">
                                </td>
                                <td>{{ Carbon\Carbon::parse($item->end_date)->format('D,d F Y')  }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge rounded-pill bg-success"> Active</span>
                                    @else
                                        <span class="badge rounded-pill bg-danger"> InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit.pbanner',$item->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('admin.delete.pbanner',$item->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SI</th>
                                <th>Promtion Banner Name</th>
                                <th>Main Image</th>
                                <th>Discount Image</th>
                                <th>End Date</th>
                                <th>Status</th>
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
