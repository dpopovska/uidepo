@extends('layouts.app')

@section('content')

	<!-- Featured items wrapper -->
	<div class="featured-items-wrapper">
		<div>
			<h1 class="ta-center">Get your daily freebie pixels</h1>
			<p>Free mockups, ui kits, icons, website and mobile templates, fonts and many more.<br />Designs created by professional designers for your personal and commercial projects.</p>
			<!-- Featured items -->
			<div class="featured-items">
				@foreach($random as $design)
					<!-- Featured item -->
					<div class="featured-item">
						<div>
							<img src="{{ asset('storage/designs/'.$design->id.'/'.$design->featured_thumbnail) }}" alt="">
							<div class="fi-info">
								<span class="fi-label">{{ $design->categories->name }}</span>
								<span class="fi-title">
									<a href="{{ url('free-ui', $design->slug) }}">{{ $design->title }}</a>
								</span>
								<span class="fi-author">by {{ $design->full_name }}</span>
							</div>
						</div>
					</div>
					<!-- Featured item -->
				@endforeach
			</div>
			<!-- Featured items -->
		</div>
	</div>
	<!-- Featured items wrapper -->

	<!-- Items feed -->
	<div class="items-feed-wrapper">
		<div class="items-sort list-items-wrapper">
			<div>
				<a class="list-item-link is-left active" id="list-recent" href="javascript:;">Recent</a>
				<a class="list-item-link is-right" id="list-popular" href="javascript:;">Popular</a>
			</div>
		</div>
		<!-- RECENT ITEMS -->
		<div class="items-feed list-recent">
			@foreach($recent as $design)
				<!-- Featured item -->
				<div class="single-item">
					<div>
						<img src="{{ asset('storage/designs/'.$design->id.'/'.$design->regular_thumbnail) }}" alt="">
						<div class="si-info">
							<span class="si-label">{{ $design->categories->name }}</span>
							<span class="si-title">{{ $design->title }}</span>
						</div>
					</div>
				</div>
				<!-- Featured item -->
			@endforeach
		</div>
		<!-- RECENT ITEMS -->

		<!-- POPULAR ITEMS -->
		<div class="items-feed list-popular hide">
			@foreach($popular as $design)
				<!-- Featured item -->
				<div class="single-item">
					<div>
						<img src="{{ asset('storage/designs/'.$design->id.'/'.$design->regular_thumbnail) }}" alt="">
						<div class="si-info">
							<span class="si-label">{{ $design->categories->name }}</span>
							<span class="si-title">{{ $design->title }}</span>
						</div>
					</div>
				</div>
				<!-- Featured item -->
			@endforeach
		</div>
		<!-- POPULAR ITEMS -->

		@include('live.partials.design-preview')

		<!-- See more items -->
		<div class="see-more-items">
			<a class="see-more-items-btn" id="load-more-btn" href="javascript:;">See more designs</a>
		</div>
		<!-- See more items -->
	</div>
	<!-- Items feed -->

	<!-- Subscribe section -->
	@include('live.partials.subscribe')

 @endsection