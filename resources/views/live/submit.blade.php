@extends('layouts.app')

@section('content')
	
	<!-- Submit page wrapper -->
	<div class="submit-page-wrapper">
		<div>
			<!-- Submit page leftcol -->
			<div class="sp-leftcol">

				@include('messages.success')

				<span>Submit Design</span>
				<p>Our subscribers and visitors are waiting for your designs. Submit your freebie and get more exposure of your work.</p>
				
				{!! Form::open(['url' => route('free-ui.store'), 'method' => 'POST', 'class' => 'default-form', 'files' => true]) !!}
					<div class="form-group notify-group">
						{!! Form::text('full_name', null, ['placeholder' => 'Full Name']) !!}
						@if ($errors->has('full_name'))
                        	<span class="error-tooltip form-input-error-tooltip">{{ $errors->first('full_name') }}</span>
                        @endif
					</div>
					<div class="form-group notify-group">
						{!! Form::text('email_address', null, ['placeholder' => 'Email Address']) !!}
						@if ($errors->has('email_address'))
                        	<span class="error-tooltip form-input-error-tooltip">{{ $errors->first('email_address') }}</span>
                        @endif
					</div>			
					<div class="form-group notify-group">
						<div class="select-field">
							{!! Form::select('categories_id', $categories, null, ['placeholder' => 'Select Category']) !!}
							@if ($errors->has('categories_id'))
	                        	<span class="error-tooltip form-select-error-tooltip">{{ $errors->first('categories_id') }}</span>
	                        @endif
						</div>
					</div>
					<div class="form-group notify-group">
						{!! Form::textarea('description', null, ['placeholder' => 'Description']) !!}
						@if ($errors->has('description'))
	                        <span class="error-tooltip form-textarea-error-tooltip">{{ $errors->first('description') }}</span>
	                    @endif
					</div>
					<div class="form-group notify-group">
						{!! Form::text('zip_link', null, ['placeholder' => 'Link to .ZIP file']) !!}
						@if ($errors->has('zip_link'))
                        	<span class="error-tooltip form-input-error-tooltip">{{ $errors->first('zip_link') }}</span>
                        @endif
					</div>
					<div class="form-group notify-group">
						{!! Form::text('backlink', null, ['placeholder' => 'Backlink (i.e. Your Twitter, Behance, Portfolio, etc...)']) !!}
						@if ($errors->has('backlink'))
                        	<span class="error-tooltip form-input-error-tooltip">{{ $errors->first('backlink') }}</span>
                        @endif
					</div>
					<div class="form-group">
						{!! Form::submit('Submit Design', ['class' => 'sp-submit-btn']) !!}
					</div>
				{!! Form::close() !!}
			</div>
			<!-- Submit page leftcol -->

			<!-- Submit page rightcol -->
			<div class="sp-rightcol">
				<div class="sp-explainer">
					<span>Guideline</span>
					<div>
						<span>1. Thumbnails</span>
						<p>- Featured thumbnail <strong>450 x 330</strong> pixels<br />- Regular thumbnail <strong>375 x 275</strong> pixels</p>
						<span>2. Preview Image(s)</span>
						<p>Minimal size must be <strong>1000 x 750</strong> pixels</p>
						<span>3. Help Document</span>
						<p>This is optional, but it is recommended to include "Help Document" if you think that there are features in your design, that should be clarified.</p>
					</div>
				</div>
			</div>
			<!-- Submit page rightcol -->
		</div>
	</div>
	<!-- Submit page wrapper -->

	<!-- Subscribe section -->
	@include('live.partials.subscribe')

@endsection