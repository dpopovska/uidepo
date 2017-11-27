@extends('layouts.cmslayout')

@section('cmscontent')

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">

	<!-- Include left col -->
	@include('layouts.partials.cmsleftcol')

	<!-- MAIN CONTENT -->
	<div class="main-content-wrapper">

		<div class="mc-titlebar">
			<span class="mc-title control-panel">Designs</span>
		</div>

	    <!-- Main content inner -->
	    <div class="mc-inner">

			<!-- Notification message for success -->
			@include('messages.success')

			<div class="buttons-cont">
				<div class="col-2">
					<a class="default-button default-abutton red fl-left" href="{{ route('designs.create') }}">Add new design</a>
				</div>
			</div>

			<!-- Grid -->
			<div class="grid">
				<div class="grid-row">
			        <div class="widget red">
	                    <!-- Widget titlebar -->
	                    <div class="widget-titlebar">
	                        <span>List of all designs</span>
	                        <div class="widget-actions">
	                            <a class="wa-settings" href="javascript:;"></a>
	                        </div>
	                    </div>
	                    <!-- Widget titlebar -->

	                    <!-- Widget main content -->
	                    <div class="widget-content-wrapper">
	                        <div class="widget-content">
	                            <table id="datatable" class="datatables display responsive dataTable" cellspacing="0" width="100%">
	                                <thead>
										<tr>
											<th>#</th>
											<th>Title</th>
											<th>Category</th>
											<th>Description</th>
											<th>Added by</th>
											<th>Status</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($designs as $br => $design)
											<tr>
												<td>{{ ++$br }}</td>
												<td>{{ $design->title }}</td>
												<td>{{ $design->categories->name }}</td>
												<td class="td-description"><span class="description-table-list">{{ strip_tags(html_entity_decode($design->description)) }}</span></td>
												<td>{{ $design->full_name }}</td>
												<td>{{ $design->status }}</td>
												<td>{{ $design->created_at->format('d.m.Y') }}</td>
												<td>
													<a class="table-edit-icon" href="{{ route('designs.edit', $design->id) }}"></a>
													<a class="table-remove-icon" title="Delete design" href="javascript:;" onclick="return confirmMsg('Delete design', 'Do you want to delete this design?', '<?php echo route('delete-design', $design->id) ?>')"></a>
												</td>
											</tr>
										@endforeach
									</tbody>
	                            </table>
	                        </div>
	                    </div>
	                    <!-- Widget main content -->
	                </div>
				</div>
			</div>
			<!-- Grid -->

	    </div>
	    <!-- Main content inner -->
	</div>
	<!-- MAIN CONTENT -->
</div>
<!-- CONTENT WRAPPER -->
@stop
