@if(Session::has('form_success'))
<!-- Page section -->
	<div class="widget-notification success">
		<span>{{ Session::get('form_success') }}</span>
		<a class="ln-close" href="javascript:;"></a>
	</div>
@endif

