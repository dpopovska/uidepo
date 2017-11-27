@extends('layouts.app')

@section('content')

	<!-- Contact page wrapper -->
	<div class="contact-page-wrapper">
		<div>
			<!-- Contact page leftcol -->
			<div class="cp-leftcol">

				@include('messages.success')
				
				<span>Contact</span>
				<p>We would like to hear from you. If you have any suggestions or feedback, feel free to use the form below and contact us.</p>

				{!! Form::open(['url' => url('contact'), 'method' => 'POST']) !!}
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
						{!! Form::text('subject', null, ['placeholder' => 'Subject']) !!}
						@if ($errors->has('subject'))
	                        <span class="error-tooltip form-input-error-tooltip">{{ $errors->first('subject') }}</span>
	                    @endif
					</div>
					<div class="form-group notify-group">
						{!! Form::textarea('message', null, ['placeholder' => 'Message']) !!}
						@if ($errors->has('message'))
	                        <span class="error-tooltip form-textarea-error-tooltip">{{ $errors->first('message') }}</span>
	                    @endif
					</div>
					<div class="form-group">
						{!! Form::submit('Send Message', ['class' => 'cp-send-btn']) !!}
					</div>
				{!! Form::close() !!}

			</div>
			<!-- Contact page leftcol -->

			<!-- Contact page rightcol -->
			<div class="cp-rightcol">
				
			</div>
			<!-- Contact page rightcol -->
		</div>
	</div>
	<!-- Contact page wrapper -->

	<!-- Subscribe section -->
	@include('live.partials.subscribe')

@endsection