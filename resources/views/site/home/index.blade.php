@extends('site.templates.template')

@section('content')


    <!-- banner -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
            <li data-target="#myCarousel" data-slide-to="4" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Brindle<span> Wood Natural</span></h3>
                        <p>Porcelain</p>

                    </div>
                </div>
            </div>
            <div class="item item2">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>cliquer<span> plus</span></h3>
                        <p>Plus</p>

                    </div>
                </div>
            </div>
            <div class="item item3">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Reclaim <span>Wood Brown</span></h3>
                        <p>Porcelain</p>

                    </div>
                </div>
            </div>
            <div class="item item4">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Juparana<span> Bordeaux</span></h3>
                        <p>Granite</p>

                    </div>
                </div>
            </div>
            <div class="item item5">
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Brazilian <span>Koa</span></h3>
                        <p>Hardwood</p>

                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!-- The Modal -->
    </div>

    <div class="schedule-bottom">
        <div class="col-md-6 agileinfo_schedule_bottom_left">
            <img src="{{url("assets/portal/imgs/mid.jpg")}}"  class="img-responsive" >
        </div>
        <div class="col-md-6 agileits_schedule_bottom_right">
            <div class="w3ls_schedule_bottom_right_grid">
                <h3>Welcome to  <span>Flooring</span> To Go</h3>
                <p> Our goal is to make the choosing of your floor covering a comfortable, enjoyable, and affordable experience while exceeding all of your expectations.</p>

                <p>Whether it's hardwood, Ceramic tiles or laminate, Flooring To Go offers the widest range of colors, textures, and patterns to compliment the desired look of your home or office. We offer products made by the America's leading manufacturers.</p>

                <p>Next-day installation!</p>



                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //schedule-bottom -->
    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <h3 class="wthree_text_info">P<span>roducts</span></h3>

            <div class="col-md-5 bb-grids bb-left-agileits-w3layouts">

                    <div class="bb-left-agileits-w3layouts-inner grid">
                        <figure class="effect-roxy">
                            <img src="{{url("assets/portal/imgs/bb1.jpg")}}"  class="img-responsive" >
                            <figcaption>
                                <h3><span>Dream</span> Home</h3>
                                <p>Bamboo</p>
                            </figcaption>
                        </figure>
                    </div>

            </div>
            <div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">

                    <div class="bb-middle-agileits-w3layouts grid">
                        <figure class="effect-roxy">
                            <img src="{{url("assets/portal/imgs/bottom3.jpg")}}"  class="img-responsive" >
                            <figcaption>
                                <h3><span>crema</span>Marfil</h3>
                                <p>Porcelain</p>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="bb-middle-agileits-w3layouts forth grid">
                        <figure class="effect-roxy">
                            <img src="{{url("assets/portal/imgs/bottom4.jpg")}}"  class="img-responsive" >
                            <figcaption>
                                <h3><span>onix white</span>and magma white </h3>
                                <p>Ceramics</p>
                            </figcaption>
                        </figure>
                    </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- /new_arrivals -->


    <div class="new_arrivals_agile_w3ls_info">


            @forelse( $posts as $post )

                <div class="col-md-4 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="{{url("assets/uploads/posts/{$post->image}")}}" alt="" class="pro-image-front" width="420" height="296">
                            <img src="{{url("assets/uploads/posts/{$post->image}")}}" alt="" class="pro-image-back" width="420" height="296">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="{{url("assets/uploads/posts/{$post->image}")}}" data-fancybox="images" data-type="image" data-caption="{{$post->title}} - {{$post->subtitle}} " class="link-product-add-cart" >
                                        {{$post->title}}
                                    </a>
                                <!-- <a href="single.html" class="link-product-add-cart">{{$post->title}}</a> -->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>



            @empty
                <p>No Product</p>
            @endforelse

            <div class="pagination-posts">
                {!! $posts->links() !!}
            </div>






    </div>
    <!-- //new_arrivals -->




@endsection