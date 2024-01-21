<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/assets') }}/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Brand</div>
            </a>
            <ul>
                </li>
                <li> <a href="{{route('admin.brand')}}"><i class="bx bx-right-arrow-alt"></i>All Brand</a>
                <li> <a href="{{route('admin.brand.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li><a href="{{route('admin.category')}}"><i class="bx bx-right-arrow-alt"></i>All Category</a></li>
                <li><a href="{{route('admin.category.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a></li>
                
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Sub Category</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>All Sub Category</a></li>
                <li> <a href="{{route('admin.subcategory.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Sub Category</a></li>
                
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Vendor Manage</div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Inactive Vendor</a>
                </li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Active Vendor</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Product Manage</div>
            </a>
            <ul>
                <li> <a href="{{route('products')}}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
                </li>
                <li> <a href="{{route('products.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Slider Manage</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.slider')}}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
                </li>
                <li> <a href="{{route('admin.slider.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Banner Manage</div>
            </a>
            <ul>
                <li><a href="{{route('admin.banner')}}"><i class="bx bx-right-arrow-alt"></i>All Banner</a></li>
                <li><a href="{{route('admin.add.banner')}}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a></li>
                
            </ul>
        </li>

        <li>
            <a href="javascript:" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Promotion Banner</div>
            </a>
            <ul>
                <li><a href="{{route('admin.pbanner')}}"><i class="bx bx-right-arrow-alt"></i>All Promotion Banner</a></li>
                <li><a href="{{route('admin.pbanner.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Promotion Banner</a></li>
                
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Coupon System</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.coupon')}}"><i class="bx bx-right-arrow-alt"></i>All Coupon</a>
                </li>
                <li> <a href="{{route('admin.coupon.add')}}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Shipping Area </div>
            </a>
            <ul>
                <li> <a href="{{route('admin.divison')}}"><i class="bx bx-right-arrow-alt"></i>All Divisions</a>
                </li>
                <li> <a href="{{route('admin.district')}}"><i class="bx bx-right-arrow-alt"></i>Add District</a>
                </li>
                <li> <a href="{{route('admin.state')}}"><i class="bx bx-right-arrow-alt"></i>Add States</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Order Manage </div>
            </a>
            <ul>
                <li> <a href="{{route('admin.all.order')}}"><i class="bx bx-right-arrow-alt"></i>All Order</a></li>
                <li> <a href="{{route('pending.order')}}"><i class="bx bx-right-arrow-alt"></i>Panding Order</a></li>
                <li> <a href="{{route('admin.confirmed.order')}}"><i class="bx bx-right-arrow-alt"></i>Confirmed Order</a></li>
                <li> <a href="{{route('admin.processing.order')}}"><i class="bx bx-right-arrow-alt"></i>Processing Order</a></li>
                <li> <a href="{{route('admin.delivered.order')}}"><i class="bx bx-right-arrow-alt"></i>Delivered Order</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Return Order  </div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Return Request</a>
                </li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Complete Return Request</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Report Manage </div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Report View</a></li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Order By User Report</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">User Manage </div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>All User</a></li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>All Vendor</a></li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Blog Manage </div>
            </a>
            <ul>
                <li> <a href="{{route('admin.blog_category')}}"><i class="bx bx-right-arrow-alt"></i>All Blog Categroy</a></li>
                <li> <a href="{{route('admin.blog_post')}}"><i class="bx bx-right-arrow-alt"></i>All Blog Post</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Review & Comment Manage </div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>All Pending Review</a></li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>All Publish Review</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Seo Setting </div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Admin Seo Setting</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Stock Manage</div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"> Product Stock</i></a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Site Setting </div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Admin Setting</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Roles & Permission Setting </div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>All Permission</a></li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>All Roles</a></li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Permission &  Roles</a></li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>All Permission &  Roles</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Admin Manage</div>
            </a>
            <ul>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>All Admin</a></li>
                <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Add Admin</a></li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
