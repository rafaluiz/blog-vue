@extends('site.templates.template')

@section('content')

    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l">
        <div class="container">
            <h3>Contact<span> Us </span></h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">

                    <ul class="w3_short">
                        <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>
    <!--/contact-->
    <div class="banner_bottom_agile_info">


        <div class="container">

            @if( Session::has('success') )
                <div class="alert alert-success hide-msg" style="float: left; width: 100%; margin: 10px 0px;">
                    {{Session::get('success')}}
                </div>
            @endif

            @if( isset($errors) && count($errors) > 0 )
                <div class="alert alert-warning" style="float: left; width: 100%; margin: 10px 0px;">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif

            <div class="contact-grid-agile-w3s">
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w31">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h4>Address</h4>
                        <p>1775 S Kirkman Rd ,<span> Unit 104 Orlando, Fl 32811, USA.</span></p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w32">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4>Call Us</h4>
                        <p><span>+1 (407) 773-6937</span><br/></p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w33">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h4>Email</h4>
                        <p><a href="mailto:info@flooringtogo.net">info@flooringtogo.net</a><br/><br/></p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="contact-w3-agile1 map" data-aos="flip-right">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.2208273819815!2d-81.46030268553608!3d28.53308149532722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e7790fd2b76ca3%3A0x899ab1b6fdf27403!2s775+S+Kirkman+Rd+%23104%2C+Orlando%2C+FL+32811%2C+EUA!5e0!3m2!1spt-BR!2sbr!4v1511231740548" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="banner_bottom_agile_info">
        <div class="container">

            <div class="agile-contact-grids">
                <div class="agile-contact-left">
                    <div class="col-md-6 address-grid">
                        <h4>For More <span>Information</span></h4>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Telephone </p><span>+1 (407) 773-6937</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Mail </p><a href="info@flooringtogo.net">info@flooringtogo.net</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Location</p><span>775 S Kirkman Rd , Unit 104 Orlando, Fl 32811 , US.</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                    </div>
                    <div class="col-md-6 contact-form">
                        <h4 class="white-w3ls">Contact <span>Form</span></h4>

                        {!! Form::open(['route' => 'contact', 'class' => 'form form-contact']) !!}
                        <div class="styled-input agile-styled-input-top">
                        {!! Form::text('name', null) !!}
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                        {!! Form::email('email', null) !!}
                            <label>Email</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                        {!! Form::text('subject', null) !!}
                            <label>Subject</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                        {!! Form::textarea('message') !!}
                            <label>Message</label>
                            <span></span>
                        </div>
                      <!--  <button class="btn-contact">Send</button> -->
                        <input type="submit" value="SEND">
                        {!! Form::close() !!}


                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--//contact-->




@endsection