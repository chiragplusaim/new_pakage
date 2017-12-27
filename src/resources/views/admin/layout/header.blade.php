<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport">
        <title> {{ trans('lang_data.head_admin_pannel') }} -</title>
		@section('main_css')
			{!! Html::style(ADMIN_BOOTSTRAP_URL().'css/bootstrap.min.css') !!}
			{!! Html::style(ADMIN_BOOTSTRAP_URL().'css/bootstrap-responsive.min.css') !!}
			{!! Html::style(ADMIN_CSS_URL().'blue.css') !!}
			{!! Html::style(ADMIN_LIB_URL().'qtip2/jquery.qtip.min.css') !!}
			{!! Html::style(ADMIN_LIB_URL().'smoke/themes/gebo.css') !!}
			{!! Html::style(ADMIN_LIB_URL().'datatables1.10.12/jquery.dataTables.min.css') !!}
			{!! Html::style(ADMIN_LIB_URL().'datatables1.10.12/responsive.dataTables.min.css') !!}
			{!! Html::style(ADMIN_CSS_URL().'style.css') !!}
			{!! Html::style(ADMIN_CSS_URL().'font-awesome.min.css') !!}
			{!! Html::style(ADMIN_LIB_URL().'intl-tel-input-master/build/css/intlTelInput.css') !!}
			<link rel="shortcut icon" href="
			<link rel="apple-touch-icon-precomposed" href="icon.png" />
			{!! Html::script(ADMIN_JS_URL().'jquery.min.js') !!}
		
			<link rel="stylesheet" href="//fonts.googleapis.com/css?family=PT+Sans" />
	@show
	</head>	
    <body>
		
			<div id="loading_layer" style="display:none"><img src="ajax_loader.gif" alt="" /></div>
			<div id="HJS_loader"></div>
			<div id="maincontainer" class="clearfix">
				<header>
					<div class="navbar navbar-fixed-top">
						<div class="navbar-inner">
							<div class="container-fluid">
								<a class="brand" href=""><i class="icon-home icon-white"></i>Package Development</a>
								<ul class="nav user_menu pull-right">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a>
										<ul class="dropdown-menu">
										
											<li><a href="{{ ADMIN_URL() }}logout">Logout</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</header>
				<div id="contentwrapper">
					<div class="main_content">
					
		

