<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>IDLC-AML</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="{{ asset("css/admin.css") }}" />

		<!-- for select2 -->
	<link href="{{ asset('assets/customByMxp/css/select2.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('assets/customByMxp/js/select2.min.js') }}"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<link rel="stylesheet" href="{{ asset('assets/scripts/easy-autocomplete.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/scripts/easy-autocomplete.themes.min.css') }}" />
</head>
<body>
	<?php $languages = App\Http\Controllers\Trans\TranslationController::getLanguageList();?>
	<div class="row hidden">
	<div class="col-md-2 col-sm-2 pull-right">
                    <select name="languageSwitcher" id="languageSwitcher" class="btn btn-primary form-control"  type="button">

                        @foreach($languages as $language)
                            <option class="Sbutton" value="{{ $language->lan_code }}" {{ ($language->lan_code == Session::get('locale')) ? 'selected' : '' }}>
                                                        {{ $language->lan_name }}
                                                    </option>
                        @endforeach
                        {{ csrf_field() }}
                    </select>
                    </div>
                    </div>

	@yield('body')


	<script src="{{ asset('assets/scripts/frontend.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/scripts/jquery.easy-autocomplete.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/ifa_filter.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/scripts/lead_filter.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/all_product_table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/journal.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/new_saleforces.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/new_saleforces_extended.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/dashboard2.js') }}"></script>

</body>
</html>