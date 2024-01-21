 
 <!--Block 03: Categories-->

@php
    $categorys = App\Models\Category::with('product')->orderBy('category_name','ASC')->limit(6)->get();
@endphp
 <div class="wrap-category xs-margin-top-80px sm-margin-top-50px">
                <div class="container">
                    <div class="biolife-title-box style-02 xs-margin-bottom-33px">
                        <span class="subtitle">Hot Categories 2023</span>
                        <h3 class="main-title">Featured Categories</h3>
                        <p class="desc">Natural food is taken from the world's most modern farms with strict safety cycles</p>
                    </div>

                    <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2}}, {"breakpoint":500, "settings":{ "slidesToShow": 1}}]}'>
                        @foreach ($categorys as $category)
                        <li>
                            <div class="biolife-cat-box-item">
                                <div class="cat-thumb">
                                    <a href="#" class="cat-link">
                                        <img src="{{ asset($category->category_image) }}" width="277" height="185" alt="">
                                    </a>
                                </div>
                                <a class="cat-info" href="#">
                                    <h4 class="cat-name">{{$category->category_name}}</h4>
                                    <span class="cat-number">({{ $category->product->count(); }})Items</span>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <div class="biolife-service type01 biolife-service__type01 sm-margin-top-25px xs-margin-top-65px">
                        <ul class="services-list">
                            <li>
                                <div class="service-inner">
                                    <span class="number">1</span>
                                    <span class="biolife-icon icon-beer"></span>
                                    <a class="srv-name" href="#">full stamped product</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-inner">
                                    <span class="number">2</span>
                                    <span class="biolife-icon icon-schedule"></span>
                                    <a class="srv-name" href="#">place and delivery on time</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-inner">
                                    <span class="number">3</span>
                                    <span class="biolife-icon icon-car"></span>
                                    <a class="srv-name" href="#">Free shipping in the city</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
