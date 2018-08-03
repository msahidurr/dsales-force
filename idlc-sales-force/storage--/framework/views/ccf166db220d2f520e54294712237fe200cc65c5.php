
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="keywords" content="Login, log-in, log in, aml, idlc aml, mutual fund, aml login"/>
        <meta name="description" content="Log-in to your account for IDLC Mutual Funds at IDLC Asset Management Limited"/>
        <meta name="robots" content="index,follow"/>

        <title>IDLC AML - Login</title>

        <!-- Bootstrap -->
        <link href="<?php echo e(asset('idlc_aml_styles')); ?>/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('idlc_aml_styles')); ?>/custom.css">
        <link rel="stylesheet" href="<?php echo e(asset('idlc_aml_styles')); ?>/animate.css">
        <link rel="stylesheet" href="<?php echo e(asset('idlc_aml_styles')); ?>/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('idlc_aml_styles')); ?>/jquery.bxslider.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('idlc_aml_styles')); ?>/font-awesome.css">
        <link rel="shortcut icon" href="http://digital.aml.idlc.com/images/favicon.png">
        <link rel="stylesheet" href="<?php echo e(asset('idlc_aml_styles')); ?>/sweetalert.css">

        <style>
            /* Prevents slides from flashing */
            #slidesShow {
                display: none;
            }

            #slidesShow .slidesjs-navigation {
                margin-top:5px;
            }

            a.slidesjs-next,
            a.slidesjs-previous,
            a.slidesjs-play,


            a.slidesjs-next {
                margin-right:10px;
                background-position: -12px 0;
            }

            a:hover.slidesjs-next {
                background-position: -12px -18px;
            }

            a.slidesjs-previous {
                background-position: 0 0;
            }

            a:hover.slidesjs-previous {
                background-position: 0 -18px;
            }

            a.slidesjs-play {
                width:15px;
                background-position: -25px 0;
            }

            a:hover.slidesjs-play {
                background-position: -25px -18px;
            }

            a.slidesjs-stop {
                width:18px;
                background-position: -41px 0;
            }

            a:hover.slidesjs-stop {
                background-position: -41px -18px;
            }

            .slidesjs-pagination {
                margin: 7px 0 0;
                float: right;
                list-style: none;
            }

            .slidesjs-pagination li {
                float: left;
                margin: 0 1px;
            }



            .slidesjs-pagination li a.active,
            .slidesjs-pagination li a:hover.active {
                background-position: 0 -13px
            }

            .slidesjs-pagination li a:hover {
                background-position: 0 -26px
            }

            #slidesShow a:link,
            #slidesShow a:visited {
                color: #333
            }

            #slidesShow a:hover,
            #slidesShow a:active {
                color: #9e2020
            }

        </style>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->    </head>
    <body>
    	<?php echo $__env->yieldContent('section'); ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/bootstrap.min.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/jquery-ui.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/jquery.bxslider.min.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/wow.min.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/jquery-scrolltofixed-min.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/idle-timer.min.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/jquery.slides.min.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/cleave.min.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/sweetalert.min.js"></script>
        <script src="<?php echo e(asset('idlc_aml_scripts')); ?>/custom.js"></script>

        <script>
                        $('[data-toggle=offcanvas]').click(function () {
                            $('.row-offcanvas').toggleClass('active');
                            $('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
                        });
        </script>
        <?php echo $__env->yieldContent('addscript'); ?>
    </body>
</html>
