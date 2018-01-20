@extends('layout.general')

@section('title', 'Teek.io - Work Smarter')

@section('content')
    <!-- Banner -->
    <div class="cps-banner style-9" id="banner">
        <div class="cps-banner-item cps-banner-item-12">
            <div class="cps-bg-round-1" data-stellar-ratio="0.5"></div>
            <div class="cps-bg-round-2" data-stellar-ratio="0.9"></div>
            <div class="cps-banner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 sm-text-center">
                            <h1 class="cps-banner-title">Get More <br/>Done Now</h1>
                            <p class="cps-banner-text">Work smarter by engaging dedicated personal assistants that love getting stuff done.</p>
                            <form class="cps-banner-form" action="#" method="post">
                                <input type="email" name="email" placeholder="Enter your email" required="">
                                <button type="submit">Get Started</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cps-banner-image hidden-sm hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-7">
                            <img class="img-responsive" src="images/banner/mock-5.png" alt="Banner Mock">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Connect everyone on rightime -->
    <div class="cps-section cps-section-padding cps-bottom-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6 sm-bottom-30">
                    <img class="img-responsive" src="images/misc/connection.svg" alt="Connection">
                </div>
                <div class="col-md-6">
                    <div class="connection-content">
                        <div class="cps-section-header text-left style-3">
                            <div class="icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <h3 class="cps-section-title cps-theme-color">Offload Tasks. Get More Done</h3>
                            <p class="cps-section-text">A personal assistant works according to your task preference sheet and saves you time to focus on what’s important to you-whether you need to schedule appointments or activate customer relationships.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Connect everyone on rightime end -->

    <!-- Custom Features -->
    <div class="cps-section cps-section-padding cps-gradient-bg" id="features">
        <div class="container">
            <div class="cps-sub-section">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6 col-xs-12 xs-bottom-30">
                        <img class="img-responsive" src="images/features/slack-2.svg" alt="...">
                    </div>
                    <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                        <h4 class="cps-subsection-title">Step up your email game</h4>
                        <p class="cps-subsection-text">Let’s handle the non-essential  administrative tasks keeps your business mechanism in motion while you focus on sales and revenue for your business. Get a personal assistant to handle lead generation, email creation and follow up and more.</p>
                    </div>
                </div>
            </div>
            <div class="cps-sub-section">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6 col-xs-12 xs-bottom-30">
                        <h4 class="cps-subsection-title">Customer support for this age</h4>
                        <p class="cps-subsection-text">From handling customer inquiries to confirming sales and filling orders, get prompt and friendly round the clock responses which will boost your relationships and unlock leads you wouldn’t have had time to pursue.</p>
                    </div>
                    <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                        <img class="img-responsive" src="images/features/slack-1.svg" alt="...">
                    </div>
                </div>
            </div>
            <div class="cps-sub-section">
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6 col-xs-12 xs-bottom-30">
                        <img class="img-responsive" src="images/features/slack-3.svg" alt="...">
                    </div>
                    <div class="col-sm-6 col-sm-pull-6 col-xs-12">
                        <h4 class="cps-subsection-title">Track projects from start to finish</h4>
                        <p class="cps-subsection-text">Spend more time on more pressing business concerns while we handle the schedule zapping tasks of meeting bookings, coordinating on boarding activities, record keeping, reports creation and much more.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom Features End -->

    <div class="cps-main-wrap">

        <!-- Pricing Table -->
        <div class="cps-section cps-section-padding cps-curve-bg-1" id="pricing">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-xs-12">
                        <div class="cps-section-header text-center">
                            <h3 class="cps-section-title">Pricing and Plans per month</h3>
                            <!--<p class="cps-section-text">Remote personal assistants for your business</p>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="cps-packages">
                        <div class="col-sm-4 col-xs-12">
                            <div class="cps-package style-2">
                                <div class="cps-package-header">
                                    <h4 class="cps-pack-name">Starter</h4>
                                </div>
                                <div class="cps-package-body">
                                    <p class="cps-pack-price">$19</p>
                                    <ul class="cps-pack-feature-list">
                                        <li><strong>Get started on a solid foundation</strong></li>
                                        <li>Get a dedicated remote personal assistant <br/><strong>3 </strong>hours daily</li>
                                    </ul>
                                </div>
                                <div class="cps-pack-footer">
                                    <a class="btn" href="#">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="cps-package style-2">
                                <div class="cps-package-header">
                                    <h4 class="cps-pack-name">Professional</h4>
                                </div>
                                <div class="cps-package-body">
                                    <p class="cps-pack-price">$30</p>
                                    <ul class="cps-pack-feature-list">
                                        <li><strong>Designed for the modern professional.</strong></li>
                                        <li>Get a dedicated remote personal assistant <br/><strong>8 </strong>hours daily</li>
                                    </ul>
                                </div>
                                <div class="cps-pack-footer">
                                    <a class="btn" href="#">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="cps-package style-2">
                                <div class="cps-package-header">
                                    <h4 class="cps-pack-name">Exclusive</h4>
                                </div>
                                <div class="cps-package-body">
                                    <p class="cps-pack-price">$150</p>
                                    <ul class="cps-pack-feature-list">
                                        <li><strong>Do more. Achieve all</strong></li>
                                        <li>Get a dedicated remote personal assistant <br/><strong>24/7 </strong></li>
                                    </ul>
                                </div>
                                <div class="cps-pack-footer">
                                    <a class="btn" href="#">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing Table End -->

        <!-- Subscription -->
        <div class="cps-section cps-section-padding subscription-style-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-xs-12">
                        <div class="cps-section-header text-center">
                            <h3 class="cps-section-title">Get started today with the 15-day trial</h3>
                            <p class="cps-section-text">Let highly trained remote personal assistants handle your tasks while you remain more productive</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <form id="subscription" class="cps-subscription" action="#" method="post">
                            <input type="email" name="email" placeholder="Your email here">
                            <button type="submit">Get Started</button>
                            <div class="clearfix"></div>
                            <p class="newsletter-success"></p>
                            <p class="newsletter-error"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscription End -->
    </div>
@endsection





