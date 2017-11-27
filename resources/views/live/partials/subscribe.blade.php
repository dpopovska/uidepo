<div class="subscribe-section">
	<div>
		<span>Free weekly resources in your Inbox</span>
		<p>Subscribe and join 3000 designers that get free resources and promotions every week</p>
			<div class="ss-subscribe-cont">
				{!! Form::open(['url' => url('subscriptions'), 'method' => 'POST', 'id' => 'subscription-form']) !!}
					<div class="subscription-group">
						{!! Form::text('email', old('form_down') ? old('email') : null, ['class' => 'ss-email', 'placeholder' => 'Insert your email address']) !!}
					    @if (old('form_down') || !is_null(session('success_down')))
					         <span class="error-tooltip">@if(!is_null(session('success_down'))) {{ session('success_down') }} @else {{ $errors->first('email') }} @endif</span>
					    @endif
					</div>
					{!! Form::submit('Submit', ['name' => 'form_down', 'class' => 'ss-submit']) !!}
				{!! Form::close() !!}
			</div>
	</div>
</div>

<!-- SUBSCRIPTION FUNCTIONALITY SCRIPTS -->
<script type="text/javascript">

	$(document).ready(function(){
	    // Navigate down to footer when there are subscription error/success messages
	    var session_down = "<?php echo session('success_down'); ?>";
	    var old_value = "<?php echo old('form_down'); ?>";
	    var errors = "<?php echo $errors->first('email'); ?>";
	    
	    if(session_down.length > 0 || (old_value.length > 0 && errors != ""))
	    {
	        $('html, body').animate({
	            scrollTop: $('.footer').offset().top
	        }, 1000);
	    }

	});
</script>
<!-- SUBSCRIPTION FUNCTIONALITY SCRIPTS -->