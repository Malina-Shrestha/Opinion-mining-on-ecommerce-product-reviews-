@extends('layouts.front')

@section('content')
    <div class="page-title-section" style="background-image: url({{ asset('public/images/electronic.jpg') }});">
        <div class="container">
            <h1>About Us</h1>
            <ul>
                <li><a href="{{ asset('/') }}">Home</a></li>
                <li><a href="{{ route('front.about')}}">About</a></li>
            </ul>
        </div>
    </div>
    <div class="section-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12"> <img src="{{ asset('public/img/content/about2.jpg') }}"
                                                            class="rounded-border shadow-primary" alt="img"> </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="pl-30-md">
                        <div class="section-heading">
                            <h4>Welcome To Our Consulting Agency</h4>
                        </div>
                        <div class="section-heading-line-left"></div>
                        <div class="text-content-big mt-20">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="row mt-20">
                            <div class="col-md-6">
                                <ul class="primary-list">
                                    <li><i class="fa fa-caret-right"></i>Immigration consultant, Information</li>
                                    <li><i class="fa fa-caret-right"></i>Consultant pharmacist Creative</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="primary-list">
                                    <li><i class="fa fa-caret-right"></i>Immigration consultant, Information</li>
                                    <li><i class="fa fa-caret-right"></i>Consultant pharmacist Creative</li>
                                </ul>
                            </div>
                        </div>
                        {{--<div class="mt-35"> <a href="{{ route('front.contact') }}" class="primary-button button-sm mb-15-xs">Contact Us</a> </div>--}}
                    </div>
                </div>
            </div>
            <div class="row mt-35">
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="feature-flex-square">
                        <div class="clearfix">
                            <div class="feature-flex-square-icon"> <i class="icon-monitor"></i> </div>
                            <div class="feature-flex-square-content">
                                <h4><a href="#">Professional Approach</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus bibendum, nunc ut
                                    hendrerit tempus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="feature-flex-square">
                        <div class="clearfix">
                            <div class="feature-flex-square-icon"> <i class="icon-wallet"></i> </div>
                            <div class="feature-flex-square-content">
                                <h4><a href="#">Finance Advisor</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus bibendum, nunc ut
                                    hendrerit tempus.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="feature-flex-square">
                        <div class="clearfix">
                            <div class="feature-flex-square-icon"> <i class="icon-clock"></i> </div>
                            <div class="feature-flex-square-content">
                                <h4><a href="#">Thought Leadership</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus bibendum, nunc ut
                                    hendrerit tempus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-block-parallax section-md" style="background-image: url({{ asset('public/img/bg/bg5.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12">
                    <div class="section-heading white-color mt-15"> <span>Gain a Success with Us !</span>
                        <h3>Get to know us better !</h3>
                        <div class="section-heading-line-left"></div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="counter-box white-color">
                                <h4 class="countup">5</h4>
                                <p>Countries</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="counter-box white-color">
                                <h4 class="countup">1500</h4>
                                <p>College & Universities</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="counter-box white-color">
                                <h4 class="countup">8000</h4>
                                <p>Happy Students</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-block-grey">
        <div class="container">
            <div class="section-heading center-holder"> <span>They are always ready to help you !</span>
                <h3>Our creative team</h3>
                <div class="section-heading-line"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut
                    labore et dolore magna aliqua.</p>
            </div>
            <div class="row mt-50">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="team-box">
                        <div class="team-img"> <img src="{{ asset('public/img/team/team1.jpg') }}" alt="img"> </div>
                        <div class="team-info"> <span>Community</span>
                            <h4><a href="#">James Wilson</a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="team-social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="team-box">
                        <div class="team-img"> <img src="{{ asset('public/img/team/team2.jpg') }}" alt="img"> </div>
                        <div class="team-info"> <span>Marketing</span>
                            <h4><a href="#">Ann White</a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="team-social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="team-box">
                        <div class="team-img"> <img src="{{ asset('public/img/team/team3.jpg') }}" alt="img"> </div>
                        <div class="team-info"> <span>Financer</span>
                            <h4><a href="#">John Doe</a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="team-social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="team-box">
                        <div class="team-img"> <img src="{{ asset('public/img/team/team4.jpg') }}" alt="img"> </div>
                        <div class="team-info"> <span>Expert</span>
                            <h4><a href="#">Emily Watson</a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="team-social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-section">
        <div class="video-area" id="video-area">
            <div class="player" id="video-play"
                 data-property="{videoURL:'https://www.youtube.com/watch?v=buBvqw6G3WU', containment:'#video-area', showControls:false, autoPlay:true, zoom:0, loop:true, mute:true, startAt:55, opacity:1, quality:'low',}">
            </div>
            <div class="video-overlay">
                <div class="video-content">
                    <div class="section-heading center-holder white-color"> <span>Gain a Success With Us!</span>
                        <h2><strong>Creative Consulting Agency</strong></h2>
                        {{--<h4>For Smart Solutions.</h4> <a href="{{ route('front.contact') }}" class="primary-button button-md mt-10">Contact Us</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-block-grey">
        <div class="container">
            <div class="section-heading center-holder"> <span>Our Testmonials</span>
                <h4>What Our Students Say</h4>
                <div class="section-heading-line"></div>
            </div>
            <div class="row mt-50">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="testmonial-box">
                        <div class="row">
                            <div class="col-2 pr-0"> <img src="{{ asset('public/img/testmonials/t-2.jpg') }}" alt="image"> </div>
                            <div class="col-10">
                                <h5>Henry Ford</h5> <span>Factory Manager</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="testmonial-box">
                        <div class="row">
                            <div class="col-2 pr-0"> <img src="{{ asset('public/img/testmonials/t-3.jpg') }}" alt="image"> </div>
                            <div class="col-10">
                                <h5>Michelle Stacey</h5> <span>Envato User</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="testmonial-box">
                        <div class="row">
                            <div class="col-2 pr-0"> <img src="{{ asset('public/img/testmonials/t-4.jpg') }}" alt="image"> </div>
                            <div class="col-10">
                                <h5>Jasmin Priestley</h5> <span>Company Owner</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="testmonial-box">
                        <div class="row">
                            <div class="col-2 pr-0"> <img src="{{ asset('public/img/testmonials/t-1.jpg') }}" alt="image"> </div>
                            <div class="col-10">
                                <h5>Jason Smith</h5> <span>Conulting Director</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notice-section notice-section-sm border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-12">
                    <div class="mt-5">
                        <h6>Thinking of Abroad Study ?</h6>
                        <div class="section-heading-line-left"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    {{--<div class="mt-10 right-holder-md"> <a href="{{ route('front.contact') }}" class="primary-button button-sm mt-15-xs">Contact Us--}}
                            {{--Today</a> </div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="section-clients border-top">
        <div class="container">
            {{--<div class="owl-carousel owl-theme clients" id="clients">--}}
                {{--<div class="item"> <img src="{{ asset('public/img/partners/partner1.png') }}" alt="partner-image"> </div>--}}
                {{--<div class="item"> <img src="{{ asset('public/img/partners/partner2.png') }}" alt="partner-image"> </div>--}}
                {{--<div class="item"> <img src="{{ asset('public/img/partners/partner3.png') }}" alt="partner-image"> </div>--}}
                {{--<div class="item"> <img src="{{ asset('public/img/partners/partner4.png') }}" alt="partner-image"> </div>--}}
                {{--<div class="item"> <img src="{{ asset('public/img/partners/partner5.png') }}" alt="partner-image"> </div>--}}
                {{--<div class="item"> <img src="{{ asset('public/img/partners/partner6.png') }}" alt="partner-image"> </div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection
