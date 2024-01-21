<!--Block 05: Banner Promotion-->

@php
    $pbanners = App\Models\PBanner::where('status',1)->limit(1)->get();
@endphp
<div class="banner-promotion-04 xs-margin-top-50px sm-margin-top-49px">
                <div class="biolife-banner promotion4 biolife-banner__promotion4">
                    <div class="container">
                        @foreach($pbanners as $pbanner)
                        <div class="banner-contain">
                            <div class="media">
                                <div class="img-moving position-1">
                                    <a href="#" class="banner-link"><img src="{{asset($pbanner->pbanner_m_image)}}" width="711" height="507" alt="img msv"></a>
                                </div>
                                <div class="img-moving position-2">
                                    <img src="{{asset($pbanner->pbanner_d_image)}}" width="155" height="145" alt="img msv">
                                </div>
                            </div>
                            <div class="text-content">
                                <b class="first-line">Special discount<br>for all fruit products</b>
                                <div class="biolife-countdown" data-datetime="{{$pbanner->end_date}} 00:00:00"></div>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold green-btn">See Offer Now!</a>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>