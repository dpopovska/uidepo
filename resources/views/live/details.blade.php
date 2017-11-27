@extends('layouts.app')

@section('content')
	
	<!-- Item Details wrapper -->
	<div class="item-details-wrapper">
		<div>
			<!-- Item Details leftcol -->
			<div class="id-leftcol">
				<!-- Item Details image -->
				<div class="id-item-image">
					<img src="{{ asset('storage/designs/'.$design->id.'/'.$design->preview_img[0]) }}" alt="">
				</div>
				<!-- Item Details image -->

				<!-- Items Details info -->
				<div class="id-info">
					<!-- Item Details tag -->
					<div>
						<a class="id-item-tag" href="{{ url('category/'.$design->categories->name) }}">{{ $design->categories->name }}</a>
					</div>
					<!-- Item Details tag -->

					<h1>{{ $design->title }}</h1>

					<!-- Breadcrumb -->
					<div>
						<ul class="breadcrumb">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('category/'.$design->categories->name) }}">{{ $design->categories->name }}</a></li>
							<li><a href="javascript:;">{{ $design->title }}</a></li>
						</ul>
					</div>
					<!-- Breadcrumb -->

					<p>{!! html_entity_decode($design->description) !!}</p>

					<!-- Item Details download and share -->
					<div class="id-download-share-cont">
						<a class="id-download-btn icon-download-symbol" href="javascript:;">Download</a>
						<ul class="id-share-options">
							<li><a class="id-share-facebook" href="javascript:;"></a></li>
							<li><a class="id-share-twitter" href="javascript:;"></a></li>
						</ul>
					</div>
					<!-- Item Details download and share -->

					<!-- Item Details tags wrapper -->
					<div class="id-tags-wrapper">
						<ul>
							@foreach($design->tags as $tag)
								<li><a href="{{ url('category/'.$tag->name) }}">{{ $tag->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- Item Details tags wrapper -->
				</div>
				<!-- Items Details info -->
			</div>
			<!-- Item Details leftcol -->

			<!-- Item Details rightcol -->
			<div class="id-rightcol">
				<!-- Rightcol ad container -->
				<div class="rightcol-ad-cont">
					<div>
						<a href="javascript:;"><img src="{{ asset('images/leftcol-ad-1.png') }}" alt=""></a>
					</div>
					<div>
						<a href="javascript:;"><img src="{{ asset('images/leftcol-ad-2.png') }}" alt=""></a>
					</div>
				</div>
				<!-- Rightcol ad container -->

				<!-- Rightcol subscribe widget -->
				<div class="rightcol-subscribe-widget">
					<span class="rsw-title">Get Free Resources</span>
					<p>Subscribe to our mailing list and receive weekly designer's resources in your inbox</p>
					{!! Form::open(['url' => url('subscriptions'), 'method' => 'POST', 'id' => 'subscription-form']) !!}
						<div class="rightcol-subscribe-input">
							{!! Form::text('email', old('form_up') ? old('email') : null, ['class' => 'rs-input-field', 'placeholder' => 'Insert your email address']) !!}
						    @if (old('form_up') || !is_null(session('success_up')))
						         <span class="error-tooltip form-subscribe-error-tooltip">@if(!is_null(session('success_up'))) {{ session('success_up') }} @else {{ $errors->first('email') }} @endif</span>
						    @endif
						    {!! Form::submit('Subscribe', ['name' => 'form_up', 'class' => 'rs-subscribe-btn']) !!}
						</div>
					{!! Form::close() !!}
					<span class="rsw-nospam-text">We will never spam your email :)</span>
				</div>
				<!-- Rightcol subscribe widget -->
			</div>
			<!-- Item Details rightcol -->
		</div>
		<!-- Details wrapper -->
	</div>
	<!-- Item Details wrapper -->

	<!-- Items feed -->
	<div class="items-feed-wrapper similar-items-wrapper">
		<div class="siw-heading">
			<span>Similar Designs</span>
		</div>
		<div class="items-feed">
			@foreach($similar as $design)
				<!-- Single item -->
				<div class="single-item">
					<div>
						<img src="{{ asset('storage/designs/'.$design->id.'/'.$design->regular_thumbnail) }}" alt="">
						<div class="si-info">
							<span class="si-label">{{ $design->categories->name }}</span>
							<span class="si-title">{{ $design->title }}</span>
						</div>
					</div>
				</div>
				<!-- Single item -->
			@endforeach
		</div>
	</div>
	<!-- Items feed -->

	<!-- Subscribe section -->
	@include('live.partials.subscribe')

@endsection