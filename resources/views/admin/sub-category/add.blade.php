
@extends('admin.admin_dashboard')

@section('title', 'Banner Add ')

@section('admin')
    <!--start page wrapper -->
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sub category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">New Sub category</li>
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
                            <form id="myForm"  action="{{route('banner.store.subcategory')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">sub Category Name</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                                                <option selected=""> Select Category</option>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sub Category Name</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="subcategory_name" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Sub Category Add" />
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

@section('script')
<script src="{{ asset('admin/assets') }}/js/3.6.0.jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                banner_title: {
                    required : true,
                },
                banner_url: {
                    required : true,
                },
            },
            messages :{
                banner_title: {
                    required : 'Please Enter Banner Title',
                },
                banner_url: {
                    required : 'Please Enter Banner Url',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>




    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>



@endsection
