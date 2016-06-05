@extends('layouts.app')

@section('content')

    <title>Create an Account - Upwork</title>

                            <link rel="stylesheet" href="https://components.elance-odesk.com/components/1.6.1/air.global.responsive.1.6.1.min.css"/>
                    <link rel="stylesheet" href="https://components.elance-odesk.com/components/1.6.1/air.components.1.6.1.min.css"/>
                    <link rel="stylesheet" href="https://components.elance-odesk.com/fonts/1.5.0/fonts.global.1.5.0.css"/>
                    <link rel="stylesheet" href="//components.elance-odesk.com/marketing-ui/master/css/interstitial.css?f337193"/>
            
    <link rel="stylesheet" href="/signup/v28/css/e237312.css?3515dab" />

    <meta property="og:title" content="Upwork: Where Savvy Businesses and Professional Freelancers Get the Job Done"/>
    <meta property="og:image" content="https://www.upwork.com/images/upwork-logo-1200.png"/>
    <meta property="og:description" content="Upwork is where the world goes to work! We are a leading online workplace, where savvy businesses hire, manage, and pay an on-demand workforce of talented freelancers."/>
    <meta property="og:url" content="https://www.upwork.com"/>
    <meta property="og:site_name" content="Upwork"/>
    <meta property="og:type" content="website"/>
</head>
<body data-ng-app="signUpApp" class="  skinny-layout user-type-page ">
                            
                    <script>
                dataLayer = [{"site":{"application":"SignupBinder","version":"3515dab","environment":"prod"},"user":{"visitor_id":"197.134.255.239.1464129120987619","recognized":true,"internal":false,"loggedIn":false}}];
            </script>
        
                    <!-- Google Tag Manager -->
            <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-K7572X&amp;site.application=SignupBinder&amp;site.version=3515dab&amp;site.environment=prod&amp;user.visitor_id=197.134.255.239.1464129120987619&amp;user.recognized=1&amp;user.internal=&amp;user.loggedIn=" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-K7572X');</script>
            <!-- End Google Tag Manager -->
                    <div id="layout">
        <div data-o-smf data-o-smf-location="very_top"></div>
    
<div ng-cloak ng-show="$root.internalServerErrors" class="container">
    <div class="row">
        <alert type="danger" class="col-md-12">
            This almost never happens, but something went wrong. Please try again later or <a href="https://support.upwork.com/">contact support</a> for assistance.
        </alert>
    </div>
</div>

        
            <!-- Interstitial SMF message -->
<interstitial-message ng-cloak>
    You've landed at the right place. oDesk is now Upwork.
    <a href="https://www.upwork.com/blog/2015/05/odesk-is-now-upwork/" target="_blank">
        Learn about the new platform.
    </a>
</interstitial-message>
<!-- Interstitial SMF message -->
    <div class="container user-type-page" ng-controller="userTypePageController">
        <div class="row m-lg-top m-xlg-bottom">
            <div class="col-md-12 m-lg-bottom">
                <hgroup class="text-center">
                    <h1 class="m-xs-top-bottom">Let's get started!</h1>
                    <h1 class="m-xs-top-bottom">First, tell us what you're looking for.</h1>
                </hgroup>
            </div>

            <div class="m-lg-bottom hidden-xs">&nbsp;</div>
            <div class="p-md-bottom visible-xs">&nbsp;</div>

            <div class="col-md-12 text-center">
                <div class="col-md-2">
                    <div class="text-muted">
                        <div><i class="glyphicon-xlg air-icon-client"></i></div>
                        <div class="o-user-type-selection">I want to register as a Donator</div>
                    </div>
                    <p class="fs-sm m-lg-bottom">
                        Please Register Below
                        <br/>
                       
                    </p>
                    <a class="btn btn-primary text-capitalize m-0" href="{!! route('user_infos.create', ['type' => 'Donator']) !!}">Donator</a>
                </div>

                <div class="col-md-2 o-or-divider">OR</div>

                <div class="col-md-2">
                    <div class="text-muted">
                    
                        <div><i class="glyphicon-xlg air-icon-freelancer"></i></div>
                        <div class="o-user-type-selection">I want to register as Benefactor</div>
                    </div>
                    <p class="fs-sm m-lg-bottom">
                       Please Register Below
                        <br/>
                       
                    </p>
                    <a class="btn btn-primary text-capitalize m-0" href="{!! route('user_infos.create', ['type' => 'Benefactor']) !!}">Benefactor</a>
                </div>
                <div class="col-md-2 o-or-divider">OR</div>
                <div class="col-md-2">
                    <div class="text-muted">
                        <div><i class="glyphicon-xlg air-icon-freelancer"></i></div>
                        <div class="o-user-type-selection">I want to register as Charity</div>
                    </div>
                    <p class="fs-sm m-lg-bottom">
                       Please Register Below
                        <br/>
                       
                    </p>
                    <a class="btn btn-primary text-capitalize m-0" href="/charities/create">Charity</a>
                </div>
            </div>
        </div>
    </div>

        <div id="layout-footer"></div>
    </div>

                            <script src="https://components.elance-odesk.com/components/1.6.1/core.1.6.1.min.js"></script>
                    <script src="//components.elance-odesk.com/marketing-ui/master/js/interstitial.js?f337193"></script>
                    <script src="https://cdn.optimizely.com/js/2765661494.js"></script>
            
    <script src="/signup/v28/js/ba56553.js?3515dab"></script>

<script>angular.module('segment', []).service('segment', function(){});</script>



<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"8e23a381b9","applicationID":"7193765","transactionName":"NVxRMRBYVhBXUhBQDAwWcgYWUFcNGV4AXBAJZkAMBVdNExhDC0wXBxdaCwZcQA==","queueTime":0,"applicationTime":59,"atts":"GRtSR1hCRR4=","errorBeacon":"bam.nr-data.net","agent":""}</script></body>
@endsection
