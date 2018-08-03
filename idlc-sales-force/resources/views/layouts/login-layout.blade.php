
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
        <link rel="stylesheet" type="text/css" href="{{ asset("css/bootstrap.min.css") }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset("css/custom.css")}} " media="all">
        <link rel="stylesheet" href="http://rblgroup.net/aml/idlc_aml_styles/animate.css">
        <link rel="stylesheet" href="http://rblgroup.net/aml/idlc_aml_styles/jquery-ui.min.css">
        <link rel="stylesheet" href="http://rblgroup.net/aml/idlc_aml_styles/jquery.bxslider.min.css">
        <link rel="shortcut icon" href="http://digital.aml.idlc.com/images/favicon.png">
        <link rel="stylesheet" href="http://rblgroup.net/aml/idlc_aml_styles/sweetalert.css">
        <link rel="stylesheet" href="http://rblgroup.net/aml/idlc_aml_styles/bootstrap-datepicker.css">

        <script type="text/javascript">
            var baseURL = 'http://rblgroup.net/aml';
        </script>

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
        <div class="modal fade" id="required_documents" tabindex="-1" role="dialog" aria-labelledby="required_documentsLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="required_documentsLabel">What is the list of required documents?</h4>
                    </div>
                    <div class="modal-body">
                        <p><strong>For Individual investor, following documents are required –</strong></p>

                        <ol>
                            <li>Copy of National Identity Card/Passport/Driving license/Identity Card (for students)</li>
                            <li>One Passport size photo - Single applicant, Joint applicant (if any), Nominee</li>
                            <li>Bank statement or Photocopy of a blank cheque leaf</li>
                            <li>E-TIN Certificate</li>
                        </ol>

                        <br>

                        <p><strong>For institutional investor, following documents are required –</strong></p>

                        <ol>
                            <li>Extract of Board resolution for investing in mutual fund</li>
                            <li>Power of Attorney of the Authorized signatories</li>
                            <li>Memorandum and Article of Association</li>
                            <li>Trust Deed (for mutual fund)</li>
                            <li>Certificate of Incorporation</li>
                            <li>One Passport size photo – CEO / MD, 1st Authorized Person, 2nd Authorized Person (if any)</li>
                            <li>Bank statement or Photocopy of a blank cheque leaf</li>
                            <li>E-TIN Certificate</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="feedbackLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="feedbackLabel">Feedback</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="submitFeedback" method="post">
                            <input type="hidden" name="request_type" value="submitFeedback">
                            <fieldset class="form-group">
                                <p>Your Name</p>
                                <input type="text" name="name" class="form-control" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <p>Phone Number</p>
                                <input type="text" name="phone_number" class="form-control" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <p>Email Address</p>
                                <input type="text" name="email" class="form-control" required>
                            </fieldset>
                            <fieldset class="form-group">
                                <p>Comments</p>
                                <textarea class="form-control" name="comment" width="100%" style="height: 120px"></textarea>
                            </fieldset>

                            <input type="submit" value="Submit" class="red_button">
                        </form>
                    </div>
                </div>
            </div>
        </div>    <header>
            <div class="container" style="padding:15px 0 5px 0">
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <a href="http://aml.idlc.com/" id="logo"></a>
                    </div>
                    <div class="col-md-1 col-xs-3" style="text-align: right">
                        <a href="tel:16409" class="call">16409</a>
                    </div>
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <a href="javascript:void(0);" class="locate">Locate Us</a>
                    </div>
                    <div class="col-md-2 col-xs-12" style="text-align: center">
                        <form action="#" id="header_search" onsubmit="return false;" class="hide">
                            <button type="submit"></button>
                            <input type="text" placeholder="" onkeyup="showResult(this.value)">
                            <div id="livesearch"></div>

                            <div class="clearfix"></div>
                        </form>
                    </div>


                    
                    <div class="col-xs-12">
                        <div class="mobile_hamburger">
                            <button class="menu-btn">
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mobile-nav">
                    <a href="#" class="menu-close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <ul class="levelone">
                        <li><span><a href="http://aml.idlc.com/"><span class=""></span><i class="fas fa-home"></i></a></span>
                        <li><span><a href="http://aml.idlc.com/products.php">Products</a> <i class="fa fa-chevron-down"></i></span>
                            <ul class="leveltwo">
                                <li><a href='http://aml.idlc.com/fund.php%3Ffund_id=6'>IDLC Balanced Fund</a></li>                    </ul>
                        </li>
                        <li><span><a href="http://aml.idlc.com/planning.php">Planning</a> <i class="fa fa-chevron-down"></i></span>
                            <ul class="leveltwo">
                                <li><a href="http://aml.idlc.com/check_your_risks.php">Check Your Risk Profile</a></li>
                                <li><a href="http://aml.idlc.com/plan_your_life_goals.php">Plan Your Life Goals</a></li>
                            </ul>
                        </li>
                        <li><span><a href="http://aml.idlc.com/awareness_and_education.php">Awareness and Education</a> <i class="fa fa-chevron-down"></i></span>
                            <ul class="leveltwo">
                                <li><a href="http://aml.idlc.com/what_is_mutual_fund.php">What is Mutual Fund</a></li>
                                <li><a href="http://aml.idlc.com/faq.php">Faq</a></li><li><a href="videos.php">Videos</a></li>
                                <li><a href="http://aml.idlc.com/mythbuster">Myth or Reality</a></li>

                            </ul>
                        </li>
                        <li><span><a href="http://aml.idlc.com/nav.php">NAV</a></span></li>
                        <li><span><a href="http://aml.idlc.com/our_story.php">Our Story</a> <i class="fa fa-chevron-down"></i></span>
                            <ul class="leveltwo">
                                <li><a href="http://aml.idlc.com/our_philosophy.php">Our Philosophy</a></li>
                                <li><a href="http://aml.idlc.com/our_journey.php">Our Journey</a></li>
                                <li><a href="http://aml.idlc.com/our_management.php">Who We Are</a></li>
                                <li><a href="http://aml.idlc.com/our_sister_concerns.php">Our Sister Concerns</a></li>
                                <li><a href="http://aml.idlc.com/http://idlc.com/news-events.php">News and Events</a></li>
                            </ul>
                        </li>
                        <li><span><a href="http://aml.idlc.com/investor_relations.php">Investor Relations</a> <i class="fa fa-chevron-down"></i></span>
                            <ul class="leveltwo">
                                <li><a href="http://aml.idlc.com/purchase_and_surrender_procedures.php">PURCHASE/SURRENDER/TRANSFER PROCEDURE</a></li>
                                <li><a href="http://aml.idlc.com/risk_factors.php">Risk Factors</a></li>
                                <li><a href="http://aml.idlc.com/statements.php">Statements</a></li>
                                <li><a href="http://aml.idlc.com/rules_and_regulations.php">Rules and Regulations</a></li>
                                <li><a href="http://aml.idlc.com/terms_and_conditions_product.php">Terms and Conditions</a></li>
                                <li><a href="http://aml.idlc.com/prospectus.php">Prospectus</a></li>
                                <li><a href="http://aml.idlc.com/forms.php">Forms</a></li>
                            </ul>
                        </li>
                        <li><span><a href="http://www.idlc.com/careers-why-idlc.php">Career</a></span></li>
                    </ul>
                </nav>
            </div>

            <div id="menu" class="wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 choose">
                            <ul>
                                <li><a href="http://aml.idlc.com/"><span class="glyphicon glyphicon-home" style="font-size: 16px"></span></a></li>
                                <li>
                                    <a href="http://aml.idlc.com/products.php">Products</a>
                                    <ul>
                                        <li><a href='http://aml.idlc.com/fund.php%3Ffund_id=6'>IDLC Balanced Fund</a></li>                            </ul>
                                </li>
                                <li>
                                    <a href="http://aml.idlc.com/planning.php">Planning</a>
                                    <ul>
                                        <li><a href="http://aml.idlc.com/check_your_risks.php">Check your risk profile</a></li>
                                        <li><a href="http://aml.idlc.com/plan_your_life_goals.php">Plan your life goals</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="http://aml.idlc.com/awareness_and_education.php">Awareness &amp; Education</a>
                                    <ul>
                                        <li><a href="http://aml.idlc.com/what_is_mutual_fund.php">What is Mutual Fund</a></li>
                                        <li><a href="http://aml.idlc.com/faq.php">Faq</a></li><li><a href="videos.php">Videos</a></li>
                                        <li><a href="http://aml.idlc.com/mythbuster">Myth or Reality</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 main_menu">
                            <ul>
                                <li><a href="http://aml.idlc.com/nav.php">Nav</a></li>
                                <li>
                                    <a href="http://aml.idlc.com/our_story.php">Our Story</a>
                                    <ul>
                                        <li><a href="http://aml.idlc.com/our_philosophy.php">Our Philosophy</a></li>
                                        <li><a href="http://aml.idlc.com/our_journey.php">Our Journey</a></li>
                                        <li><a href="http://aml.idlc.com/our_management.php">Who We Are</a></li>
                                        <li><a href="http://aml.idlc.com/our_sister_concerns.php">Our Sister Concerns</a></li>
                                        <li><a href="http://idlc.com/news-events.php">News and Events</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="http://aml.idlc.com/investor_relations.php">Investor Relations</a>
                                    <ul>
                                        <li><a href="http://aml.idlc.com/purchase_and_surrender_procedures.php">PURCHASE/SURRENDER/TRANSFER PROCEDURE</a></li>
                                        <li><a href="http://aml.idlc.com/risk_factors.php">Risk Factors</a></li>
                                        <li><a href="http://aml.idlc.com/statements.php">Statements</a></li>
                                        <li><a href="http://aml.idlc.com/rules_and_regulations.php">Rules &amp; Regulations</a></li>
                                        <li><a href="http://aml.idlc.com/terms_and_conditions_product.php">Terms and Conditions</a></li>
                                        <li><a href="http://aml.idlc.com/prospectus.php">Prospectus</a></li>
                                        <li><a href="http://aml.idlc.com/forms.php">Forms</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://www.idlc.com/careers-why-idlc.php">Career</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class='page_heading'>
            <div class='cover' xmlns="http://www.w3.org/1999/html">
                <img src='http://digital.aml.idlc.com/images/cover_1.jpg' alt=''>
            </div>
            <div class='container'>
                <div class='single_heading wow fadeInDown'>
                    <h1>IFA Registration</h1>
                </div>
            </div>
        </section>

        <section class="page_content">
            <div class="container">
                <style type="text/css">
    body {
        position: relative;
    }
    .nav-pills{
        border : 1px solid #DDD;
        background: #ce2327;
    }
    .nav > li >a{
        color:#fff;
        text-align: center;
    }
    .nav-pills > li.active > a,
    .nav-pills > li.active > a:focus,
    .nav-pills > li.active > a:hover {
        color: #fff;
        background-color: maroon;
    }

    .nav > li > a:focus,
    .nav > li > a:hover {
        text-decoration: none;
        background-color: maroon;
    }
    .nav .li_1{
        width: 31.3%;
    }

    @media(max-width: 580px){
        .nav .li_1{
            width: 100%;
        }
        .nav li{
            width: 100%;
        }
    }
</style>

<div class="">

    @yield('content')
        
        

</div>


            </div>
        </section>

        <div class="clearfix"></div>

        <footer>
            <div class="container">
                <div class="row footer-comps">
                    <div class="col-md-2">
                        <h4>Explore</h4>

                        <ul>
                            <li><a href="nav.php">NAV</a></li>
                            <li><a href="our_story.php">Our Story</a></li>
                            <li><a href="http://www.idlc.com/careers-why-idlc.php">Career</a></li>
                            <li><a href="http://idlc.com/news-events.php">News and Events</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h4>FORMS &amp; DOWNLOADS</h4>

                        <ul>
                            <li><a href="prospectus.php">Formation Documents</a></li>
                            <li><a href="forms.php">Forms</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#required_documents">Required Documents</a></li><li><a href="https://drive.google.com/open?id=0B4GWzFnCAMD2UTY0NUN6VnlqWDg">Launch Presentation</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h4>Feedback</h4>

                        <p>Send us your feedback. we would love to hear from you.</p>

                        <center><button type="button" class="red_button" data-toggle="modal" data-target="#feedback" style="font-size: 16px;padding: 5px 10px;margin-top: 0px;display: inline-block;text-align: center;margin: 0">Feedback</button></center>
                    </div>
                    <div class="col-md-3">
                        <h4>IDLC AML HEAD OFFICE</h4>
                        <p>IDLC Asset Management Limited</p><p>South Avenue Tower (5th Floor)<br>Unit 502, House 50, Road 3<br>7 Gulshan Avenue, Dhaka 1212, Bangladesh</p>
                        <p>Contact: 16409</p>
                        <p>Fax: +88-02-9896142</p>

                    </div>
                    <div class="col-md-2" style="text-align: center">
                        <h4>Connect with us</h4>

                        <a href="https://www.facebook.com/IDLC.FinancingHappiness/" class="fb"></a> <a href="https://www.linkedin.com/company/idlc-finance-limited"class="in"></a> <a href="https://www.youtube.com/user/idlcfinancelimited" class="yt"></a>
                    </div>
                </div>

                <div class="row footer-meta">
                    <div class="col-md-6"><p>COPYRIGHT 2017 | IDLC ASSET MANAGEMENT LIMITED</p></div>
                    <div class="col-md-6"><p style="text-align:right"><a href="disclaimer.php">Disclaimer</a> <a href="privacy_policy.php">Privacy Policy</a>
                            <a href="terms_and_conditions.php">Terms &amp; Conditions</a></p></div>
                </div>
            </div>
        </footer>
        {{-- <a href="#" id="totop" class="fas fa-arrow-up">TOP</a> --}}

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/jquery-ui.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/jquery.bxslider.min.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/wow.min.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/jquery-scrolltofixed-min.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/idle-timer.min.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/jquery.slides.min.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/cleave.min.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/sweetalert.min.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/custom.js"></script>
        <script src="http://rblgroup.net/aml/idlc_aml_scripts/bootstrap-datepicker.js"></script>

        <script src="http://rblgroup.net/aml/idlc_aml_scripts/new_custom.js"></script>

        <script>
                                $('[data-toggle=offcanvas]').click(function () {
                                    $('.row-offcanvas').toggleClass('active');
                                    $('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
                                });
        </script>
        <script>

    $(function () {

        var prevText = '';
        var formId = '';
        var datatxt = '';
        var dataelm = '';
        $('.btnFormSubmit').click(function () {
            prevText = $(this).val();
            datatxt = $(this).data("txt");
            dataelm = $(this);
            formId = $(this).closest('form').attr('id');
        });

        $(document).on({
            ajaxStart: function () {
                dataelm.attr({value: 'Processing...', disabled: 'disabled'});
            },
            ajaxStop: function () {
                dataelm.removeAttr("disabled");
                dataelm.val(datatxt);
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {

                    $('.uploaded_picture_preview_div').html('');
                    $('.uploaded_picture_preview_div').prepend($('<img>', {id: 'uploaded_picture_preview', src: e.target.result, alt: 'Uploaded Picture Preview', width: 100}));
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('input[type=radio][name=is_same_as_present_address]').change(function () {
            var flag = this.value;
            $('.is_same_as_present_address_flag_yes').css('display', (flag === 'yes' ? 'none' : ''));
        });

        $('input[type=radio][name=job_holder]').change(function () {
            var flag = this.value;
            $('.job_holder_flag_yes').css('display', (flag === 'yes' ? '' : 'none'));
        });

        $('input[type=radio][name=student]').change(function () {
            var flag = this.value;
            $('.student_flag_yes').css('display', (flag === 'yes' ? '' : 'none'));
        });

        $('input[type=radio][name=receive_sales_commission_by]').change(function () {
            var flag = this.value;
            if (flag === 'Bank') {
                $('.receive_sales_commission_by_flag_Bank').css('display', '');
                $('.receive_sales_commission_by_flag_bKash').css('display', 'none');
            } else if (flag === 'bKash') {
                $('.receive_sales_commission_by_flag_Bank').css('display', 'none');
                $('.receive_sales_commission_by_flag_bKash').css('display', '');
            }

        });
        $('#upload_picture').change(function () {
            readURL(this);
        });

        $('form').submit(function () {

            $(this).find('.form-group').removeClass('has-error');
            $(this).find('span[class*="help-block"]').remove();

            $('#success_message_alert').css('display', 'none');

            var form_action = $(this).attr('action');
            var form_method = $(this).attr('method');
            var form_data = new FormData(this);

            $.ajax({
                type: form_method,
                url: form_action,
                data: form_data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {

                    $('body').scrollspy({target: '#myScrollspy'});

                    if (response.has_error === true) {

                        $.each(response.error_messages, function (key, value) {

                            $('#' + key).closest('div[class^="form-group"]').addClass('has-error');
                            var hasClassInputGroup = $('#' + key).closest('div').hasClass('input-group');
                            var after_append = hasClassInputGroup === true ? $('#' + key).closest('div') : $('#' + key);
                            after_append.after($('<span />', {class: 'help-block', text: value}));
                        });
                    } else if (response.has_success === true) {

                        if (response.success_messages.enable_step == 1) {
                            window.location.href = "http://rblgroup.net/aml/ifa-registration-form/getedit";
                        }

                        var application_no = response.success_messages.application_no;
                        var step = response.success_messages.enable_step;
                        var enable_steps_id = response.success_messages.enable_steps_id;
                        var disable_steps_id = response.success_messages.disable_steps_id;

                        $('#success_message_alert').css('display', '');
                        $('#success_message_msg').html('Data successfully saved. Application no. : ' + application_no);
                        if (datatxt == 'Submit') {
                            $('.nav-tabs').find('a[href="#' + enable_steps_id[0] + '"]').closest('li').addClass('active').removeClass('disabled');
                            $('.nav-tabs').find('a[href="#' + enable_steps_id[0] + '"]').attr('data-toggle', 'tab');
                            $('.tab-content').find('#' + enable_steps_id[0]).addClass('in').addClass('active');

                            for (var disable_step_count = 0; disable_step_count < disable_steps_id.length; disable_step_count++) {
                                $('.nav-tabs').find('a[href="#' + disable_steps_id[disable_step_count] + '"]').closest('li').removeClass('active').addClass('disabled');
                                $('.nav-tabs').find('a[href="#' + disable_steps_id[disable_step_count] + '"]').removeAttr('data-toggle', 'tab');
                                $('.tab-content').find('#' + disable_steps_id[disable_step_count]).removeClass('in').removeClass('active');
                            }
                        }
                        $('#ifa_registration_form_step_' + step).find('input[name="application_no"]').val(application_no);
                        $('#ifa_registration_form_step_' + step).find('input[name="step"]').val(step);
                    }
                },
                error: function () {

                }
            });

            return false;
        });


        var thanasDistrict = (function () {
            return {
                init: function () {
                    $('.division_id').on('change', function () {

                        var whereToAppend = $(this).closest('div').parent().next().find('.district_id');
//                        console.log($(this).closest('div').parent().next().attr('class'));

                        var selectedValue = $.trim($(this).find(":selected").val());
                        $.ajax({
                            type: "GET",
                            url: baseURL + "/get/division",
                            data: "district_id=" + selectedValue,
                            datatype: 'json',
                            cache: false,
                            async: false,
                            success: function (result) {
                                var data = JSON.parse(result);
                                if (data.length === 0)
                                {
                                    whereToAppend.html($('<option>', {
                                        value: '',
                                        text: 'Choose District'
                                    }));

                                } else {
                                    whereToAppend.html($('<option>', {
                                        value: "",
                                        text: "Select District"
                                    }));
                                    for (ik in data) {
                                        whereToAppend.append($('<option>', {
                                            value: data[ik].district_id,
                                            text: data[ik].district_name
                                        }));
                                    }
                                }
                            },
                            error: function (result) {
                                alert("Some thing is Wrong");
                            }
                        });
                    });
                }
            };
        })();

        var divDisThanas = (function () {

            return{
                init: function () {

                    var divisionValue = '';

                    $('.division_id').on('change', function () {
                        divisionValue = $.trim($(this).find(":selected").val());
                    });

                    $('.district_id').on('change', function () {

                        var whereToAppend = $(this).closest('div').parent().next().find('.thana_id');
                        var districtValue = $.trim($(this).find(":selected").val());

                        $.ajax({
                            type: "GET",
                            url: baseURL + "/get/div/dis/thanas",
                            data: {division_id: divisionValue, district_id: districtValue},
                            datatype: 'json',
                            cache: false,
                            async: false,
                            success: function (result) {
                                var data = JSON.parse(result);
                                if (data.length === 0)
                                {
                                    whereToAppend.html($('<option>', {
                                        value: '',
                                        text: 'Choose Thana'
                                    }));

                                } else {
                                    whereToAppend.html($('<option>', {
                                        value: "",
                                        text: "Select Thana"
                                    }));
                                    for (ik in data) {
                                        whereToAppend.append($('<option>', {
                                            value: data[ik].thana_id,
                                            text: data[ik].thana_name
                                        }));
                                    }
                                }
                            },
                            error: function (result) {
                                alert("Some thing is Wrong");
                            }
                        });
                    })
                }
            }
        })();

        var getBankBranch = (function () {

            return {
                init: function () {
                    $('#bank').on('change', function () {
                        var bankValue = $.trim($("#bank").find(":selected").val());

                        $.ajax({
                            type: "GET",
                            url: baseURL + "/get/bank/branch",
                            data: {bank_id: bankValue},
                            datatype: 'json',
                            cache: false,
                            async: false,
                            success: function (result) {
                                var data = JSON.parse(result);
                                if (data.length === 0)
                                {
                                    $('#branch').html($('<option>', {
                                        value: '',
                                        text: 'Choose Branch'
                                    }));

                                } else {
                                    $('#branch').html($('<option>', {
                                        value: "",
                                        text: "Select Branch"
                                    }));
                                    for (ik in data) {
                                        $('#branch').append($('<option>', {
                                            value: data[ik].branch_id,
                                            text: data[ik].branch_name
                                        }));
                                    }
                                }
                            },
                            error: function (result) {
                                alert("Some thing is Wrong");
                            }
                        });
                    });
                }
            }
        })();

        thanasDistrict.init();
        divDisThanas.init();
        getBankBranch.init();

    });
</script>
    </body>
</html>
