@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	<!-- Include left col -->
	@include('layouts.partials.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Edit an existing design item</span>
		</div>

	    <!-- Main content inner -->
	    <div class="mc-inner">

			<!-- Notification messages for error/success -->	
			@include('errors.formerrors')

	    	<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="{{ route('designs.index') }}">Back</a>
				</div>
			</div>

			<!-- Grid -->	
			<div class="grid-row">
				<!-- Column -->
				<div class="col-6">
					<!-- Default widget -->
					<div class="widget red">
						<!-- Widget titlebar -->
						<div class="widget-titlebar">
							<span>Complete the form below</span>
							<div class="widget-actions">
								<a class="wa-settings" href="javascript:;"></a>
							</div>
						</div>
						<!-- Widget titlebar -->

						<!-- Widget main content -->
						<div class="widget-content-wrapper">
							<div class="widget-content">
								{!! Form::model($design, ['method'=> 'PATCH', 'route' => ['designs.update', $design->id], 'class' => 'default-form', 'files' => true]) !!}
									@include('designs.editable_form', ['buttonName' => 'Edit'])
								{!! Form::close() !!}
							</div>
						</div>
						<!-- Widget main content -->
					</div>
					<!-- Default widget -->
				</div>
				<!-- Column -->
			</div>
			<!-- Grid -->
		</div>
		<!-- Main content inner -->
	</div>
	<!-- MAIN CONTENT -->
</div>
<!-- CONTENT WRAPPER -->

@stop
