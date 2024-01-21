 <!--Block 02: Banners-->

@php
    $banner = App\Models\Banner::orderBy('banner_title','ASC')->limit(6)->get();
@endphp
 <div class="banner-block sm-margin-bottom-76px xs-margin-top-80px sm-margin-top-60px">
                <div class="container">
                    <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}}, {"breakpoint":500, "settings":{ "slidesToShow": 1}}]}'>
                        @foreach ($banner as $banner)
                        <li>
                            <div class="biolife-banner style-02 biolife-banner__style-02" style="background-color:{{$banner->banner_url}}">
                                <div class="banner-contain">
                                    <div class="media">
                                        <a href="#" class="bn-link"><img src="{{ asset($banner->banner_image) }}" width="135" height="206" alt=""></a>
                                    </div>
                                    <div class="text-content">
                                        <span class="text1">{{$banner->banner_title}}</span>
                                        <b class="text2">100% Pure Natural Fruit Juice</b>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>