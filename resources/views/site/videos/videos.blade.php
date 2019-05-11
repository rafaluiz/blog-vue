@extends('site.templates.template')

@section('content')


    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l">
        <div class="container">
            <h3>Installation<span></span></h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">

                    <ul class="w3_short">
                        <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                        <li>Installation</li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>



    <div class="banner_bottom_agile_info">
        <div class="container">


            <div class="banner_bottom_agile_info_inner_w3ls">



                <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">

                    <video width="500" height="350" controls>
                        <source src="{{url("assets/portal/videos/video1.mp4")}}" type="video/mp4">
                        Your browser does not support the video tag. </video>


                    <!--<figure class="effect-roxy">
                        <img src="{{url("assets/portal/imgs/bottom4.jpg")}}" alt=" " class="img-responsive" />
                        <figcaption>
                            <h3><span>onix white</span>and magma white </h3>
                            <p>Ceramics</p>
                        </figcaption>
                    </figure> -->
                </div>

                <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                    <video width="500" height="350" controls>
                        <source src="{{url("assets/portal/videos/video2.mp4")}}" type="video/mp4">
                        Your browser does not support the video tag. </video>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection