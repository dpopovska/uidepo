<!DOCTYPE HTML>
<!--[if IE 9 ]>    <html lang="en" id="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<title>UI Depo | Homepage</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<meta name="robots" content="index, follow, noarchive"/>
	<meta name="googlebot" content="noarchive"/>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/global.css') }}"  />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" />

	<!--jQuery-->
	<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	
	<!--Scripts-->
	<script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

	<!--Base Url-->
	<script type="text/javascript"> 
		var globalAssetUrl = "{{ asset('') }}"; 
	</script>

</head>
<body>
	<!-- Header -->
	<div class="header">
		<a class="logo" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
		<!-- Navigation wrapper -->
		<div class="navigation-wrapper">
			<!-- Navigation -->
			<div class="navigation">
				<ul>
					@foreach($categories as $category)
						<li><a href="{{ url('category/'.$category->link) }}">{{ $category->name }}</a></li>
					@endforeach
				</ul>
			</div>
			<!-- Navigation -->

			<!-- Search field -->
			<div class="search">
				{!! Form::open(['method' => 'GET', 'url'=> url('search')])  !!}
					<div class='header-search-field'>
						{!! Form::text('term', null, ['placeholder' => 'Search', 'class' => 'search-input']) !!}
						{!! Form::submit(null, ['class' => 'search-action']) !!}
					</div>
				{!! Form::close() !!}
			</div>
			<!-- Search field -->

			<!-- Submit Design action button -->
			<div class="submit-design-action">
				<a class="icon-rocket" href="{{ url('free-ui/create') }}">Submit Design</a>
			</div>
			<!-- Submit Design action button -->
		</div>
		<!-- Navigation wrapper -->
	</div>
	<!-- Header -->

	@yield('content')
	
	<div class="footer">
		<div>
			<ul class="footer-navigation">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="javascript:;">About</a></li>
				<li><a href="{{ url('contact') }}">Contact</a></li>
				<li><a href="{{ url('free-ui/create') }}">Submit Design</a></li>
				<li><a href="javascript:;">Advertise</a></li>
				<li><a href="javascript:;">Blog</a></li>
			</ul>
			<ul class="footer-social">
				<li><a class="fs-facebook" href="javascript:;"></a></li>
				<li><a class="fs-twitter" href="javascript:;"></a></li>
				<li><a class="fs-instagram" href="javascript:;"></a></li>
			</ul>
		</div>
	</div>
</body>

</html>