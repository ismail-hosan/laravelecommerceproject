@extends('frontend.user_dashboard')

@section('title','home')

@section('user')
<!-- Page Contain -->
<div class="page-contain">

    <!-- Main content -->
    <div id="main-content" class="main-content">


        @include('frontend.home.menu_bar')

        <!-- Block 02: Grid Banners-->
        @include('frontend.home.banner')

        <!-- Block 03: Best Sell Product Tab-->
        @include('frontend.home.category')

        <!-- Block 04: Ditails Banners-->
        @include('frontend.home.products_tab')

        <!-- Block 05: Banner Promotion-->
        @include('frontend.home.promotion_banner')

        <!-- Block 06: Product Tab-->
        @include('frontend.home.advance_box')

        <!-- Block 07: Blog posts-->
        @include('frontend.home.brand')

        <!-- Block 08: Arivel Products-->
        @include('frontend.home.products')

        <!-- Block 09: Instagram-->
        @include('frontend.home.blog_post')

    </div>
</div>
@endsection