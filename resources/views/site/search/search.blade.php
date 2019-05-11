@extends('site.templates.template')

@section('content')



    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l">
        <div class="container">
            <h3>Search</h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">

                    <ul class="w3_short">
                        <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                        <li>Result for: {{$dataForm['key-search']}} </li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>


    <div class="new_arrivals_agile_w3ls_info">


            <div class="col-md-12">


                @forelse( $posts as $post )


                    <div class="col-md-4 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{url("assets/uploads/posts/{$post->image}")}}" alt="" class="pro-image-front" width="420" height="296">
                                <img src="{{url("assets/uploads/posts/{$post->image}")}}" alt="" class="pro-image-back" width="420" height="296">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url("assets/uploads/posts/{$post->image}")}}" data-fancybox="images" data-type="image" data-caption="{{$post->title}} " class="link-product-add-cart">
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
        <div class="clearfix"> </div>
    </div>

@endsection