@extends('site.templates.template')

@section('content')


    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l">
        <div class="container">
            <h3>About<span>Us</span></h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">

                    <ul class="w3_short">
                        <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                        <li>About</li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>



    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="agile_ab_w3ls_info">
                <div class="col-md-6 ab_pic_w3ls">
                    <img src="{{url("assets/portal/imgs/bottom1.jpg")}}" alt=" " class="img-responsive" />
                </div>
                <div class="col-md-6 ab_pic_w3ls_text_info">
                    <h5>About <span>Flooring  to go</span> </h5>
                    <p>
                        Our goal is to make the choosing of your floor covering a comfortable, enjoyable, and affordable experience while exceeding all of your expectations.
                     </p>
                    <p>
                        Whether it's hardwood, Ceramic tiles or laminate,  Flooring To Go offers the widest range of colors, textures, and patterns to compliment the desired look of your home or office. We offer products made by the America's leading manufacturers.
                     </p>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="banner_bottom_agile_info_inner_w3ls">

                <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                    <figure class="effect-roxy">
                        <img src="{{url("assets/portal/imgs/bottom4.jpg")}}" alt=" " class="img-responsive" />
                        <figcaption>
                            <h3><span>onix white</span>and magma white </h3>
                            <p>Ceramics</p>
                        </figcaption>
                    </figure>
                </div>

                <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                    <figure class="effect-roxy">
                        <img src="{{url("assets/portal/imgs/bottom3.jpg")}}" alt=" " class="img-responsive" />
                        <figcaption>
                            <h3><span>crema</span>Marfil</h3>
                            <p>Porcelain</p>
                        </figcaption>
                    </figure>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection