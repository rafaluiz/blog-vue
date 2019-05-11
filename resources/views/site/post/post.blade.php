@extends('site.templates.template')

@section('content')

    <!--/single_page-->
    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l">
        <div class="container">
            <h3>{{$post->title}} <span>{{$post->subtitle}} </span></h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">

                    <ul class="w3_short">
                        <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                        <li>{{$post->title}}</li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>

    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">

                    <p>
                        <a href="{{url("assets/uploads/posts/{$post->image}")}}" data-fancybox="images-preview" >
                            <img src="{{url("assets/uploads/posts/{$post->image}")}}" width="100%"/>
                        </a>
                    </p>


                        <div class="clearfix"></div>

                </div>
            </div>
            <div class="col-md-8 single-right-left simpleCart_shelfItem">
                <h3>{{$post->title}}</h3>



                <p>
                    {!! $post->description !!}
                </p>

            </div>



        </div>
    </div>
    <!--//single_page-->






    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>


@endsection
