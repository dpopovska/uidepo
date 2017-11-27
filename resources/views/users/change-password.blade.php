@extends('layouts/cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	<!-- Include left col -->
	@include('layouts.partials.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Change password</span>
	    </div>

	    <!-- Main content inner -->
	    <div class="mc-inner">

			<!-- Notification messages for error/success -->
			@include('errors.formerrors')

	    	<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="{{ route('users.index') }}">Back</a>
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
								{!! Form::open(['url' => route('post-inner-admin-change-pass', $id), 'method' => 'POST', 'class' => 'default-form']) !!}
									<!-- Form group wrapper -->
									<div class="form-group-wrapper">
										<!-- Regular input -->
										<div class="form-group">
						                    <span class="fg-title">New password</span>
						                    <div class="fg-field">
						                        <input type="password" class="fg-input-field" name="password">
						                    </div>
						                </div>
										<!-- Regular input -->

										<!-- Regular input -->	
						                <div class="form-group">
						                    <span class="fg-title">Confirm new password</span>
						                    <div class="fg-field">
						                        <input type="password" class="fg-input-field" name="password_confirmation">
						                    </div>
						                </div>
										<!-- Regular input -->

										<!-- Regular half inputs -->
										<div class="form-group">
											<div class="col-4">
												{!! Form::submit('Change password', ['class' => 'default-button cyan fl-left']) !!}
											</div>
										</div>
									</div>
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
