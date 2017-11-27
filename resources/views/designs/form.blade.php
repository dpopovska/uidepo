<!-- Form group wrapper -->
<div class="form-group-wrapper">

	<!-- Regular input -->
	<div class="form-group">
		<span class="fg-title mandatory">Title</span>
		<div class="fg-field">
			{!! Form::text('title', null, ['class'=>'fg-input-field']) !!}
		</div>
	</div>
	<!-- Regular input -->

	<!-- Select dropdown -->
	<div class="form-group">
		<span class="fg-title mandatory">Category</span>
		<div class="select-two-wrapper">
			{!! Form::select('categories_id', $categories, null, ['placeholder' => 'Select category', 'class'=>'select-two-field']) !!}
		</div>
	</div>
	<!-- Select dropdown -->

	<!-- Regular textarea -->
	<div class="form-group">
		<span class="fg-title mandatory">Description</span>
		<div class="fg-field fg-tinymce-textarea">
			{!! Form::textarea('description', null, ['class' => 'tinymce']) !!}
		</div>
	</div>
	<!-- Regular textarea -->
	
	<!-- FEATURED THUMBNAIL -->
	<!-- Regular image input -->
	<div class="form-group">
		<span class="fg-title mandatory">Featured Thumbnail</span>
        <div class="fg-field">
            <div class="fg-file-field">
            	<input type="file" name="featured_thumbnail" id="featured_thumbnail">
              	<span>Choose a thumbnail</span>
            </div>
        </div>
	</div>
	<span class="fg-field-notification" style="width: 100%">*Featured thumbnail 450 x 330 pixels</span>
	<!-- Regular image input -->
    <!-- FEATURED THUMBNAIL -->

	<!-- REGULAR THUMBNAIL -->
	<!-- Regular image input -->
	<div class="form-group">
		<span class="fg-title mandatory">Regular Thumbnail</span>
        <div class="fg-field">
            <div class="fg-file-field">
            	<input type="file" name="regular_thumbnail" id="regular_thumbnail">
              	<span>Choose a thumbnail</span>
            </div>
        </div>
	</div>
	<span class="fg-field-notification" style="width: 100%">*Regular thumbnail 375 x 275 pixels</span>
	<!-- Regular image input -->
	<!-- REGULAR THUMBNAIL -->

	<!-- PREVIEW IMAGE(S) -->
	<!-- Regular image input -->
	<div class="form-group">
		<span class="fg-title mandatory">Preview Image(s)</span>
        <div class="fg-field">
            <div class="fg-file-field">
            	<input type="file" name="preview_img[]" multiple id="preview_img">
              	<span>Choose preview image(s)</span>
            </div>
        </div>
	</div>
	<span class="fg-field-notification" style="width: 100%">*Minimal size must be 1000 x 750 pixels</span>
	<!-- Regular image input -->
	<!-- PREVIEW IMAGE(S) -->

	<!-- HELP DOCUMENT -->
	<!-- Regular document input -->
	<div class="form-group">
		<span class="fg-title mandatory">Help Document</span>
        <div class="fg-field">
            <div class="fg-file-field">
            	<input type="file" name="help_document" id="help_document">
              	<span>Choose a help document</span>
            </div>
        </div>
	</div>
	<!-- Regular document input -->
	<!-- HELP DOCUMENT -->
	
	<!-- Form group -->
    <div class="form-group">
        <span class="fg-title">Tags</span>
        <!-- Select2 wrapper -->
        <div class="select-two-wrapper">
        	{!! Form::select('tag_id[]', $tags, null, ['data-placeholder' => 'Select one or multiple tags', 'multiple' => true, 'class'=>'multiple-select']) !!}
        </div>
        <!-- Select2 wrapper -->
    </div>
    <!-- Form group -->

	<!-- Regular input -->
	<div class="form-group">
		<div class="col-4">
			{!! Form::submit($buttonName, ['class' => 'default-button cyan fl-left']) !!}
		</div>
	</div>
</div>