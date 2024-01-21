@extends('admin.admin_dashboard')

@section('title', 'Coupon Add ')

@section('admin')
    <!--start page wrapper -->
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Coupon</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Coupon Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form id="myForm"  action="{{route('admin.update.pbanner')}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $pbanner->id }}">
                                <input type="hidden" name="main_old_image" value="{{ $pbanner->pbanner_m_image }}">
                                <input type="hidden" name="dis_old_image" value="{{ $pbanner->pbanner_d_image }}">
                                <div class="card-body">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Banner Name</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="pbanner_name" class="form-control" value="{{ $pbanner->pbanner_name }}"/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Banner Main Image</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="file" name="pbanner_main_image" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img src="{{ asset($pbanner->pbanner_m_image) }}"
                                                alt="Admin" style="width: 100px" height="100px" id="showImage">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Banner Discount Image</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="file" name="pbanner_discount_image" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img src="{{ asset($pbanner->pbanner_d_image) }}"
                                                alt="Admin" style="width: 100px" height="100px" id="showImage">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Offer End Date</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="date" name="pbanner_end_date" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $pbanner->end_date }}"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Update Promotion Banner" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    @include('admin.alert')
@endsection


