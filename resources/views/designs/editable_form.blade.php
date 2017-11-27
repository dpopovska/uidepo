<!-- Form group wrapper -->
<div class="form-group-wrapper">

	@if($design->zip_link)
		<!-- Regular input -->
		<div class="form-group">
			<span class="fg-title mandatory">Link to .ZIP file</span>
			<div class="fg-field">
				{!! Form::text('zip_link', null, ['class'=>'fg-input-field']) !!}
			</div>
		</div>
		<!-- Regular input -->
	@endif

	@if($design->backlink)
		<!-- Regular input -->
		<div class="form-group">
			<span class="fg-title mandatory">Backlink (i.e. Your Twitter, Behance, Portfolio, etc...)</span>
			<div class="fg-field">
				{!! Form::text('backlink', null, ['class'=>'fg-input-field']) !!}
			</div>
		</div>
		<!-- Regular input -->
	@endif

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
	<!-- Show the thumbnail while editing the details -->
	@if(isset($design) && $design->featured_thumbnail != "" && file_exists('storage/designs/'.$design->id.'/'.$design->featured_thumbnail))	  	
    	<div class="form-group">
            <?php list($width, $height) = getimagesize('storage/designs/'.$design->id.'/'.$design->featured_thumbnail); ?>
            @if($width < $height)
              <img alt="{{ $design->featured_thumbnail }}" src="{{ asset('storage/designs/'.$design->id.'/'.$design->featured_thumbnail) }}" height="250px">
            @else
              <img alt="{{ $design->featured_thumbnail }}" src="{{ asset('storage/designs/'.$design->id.'/'.$design->featured_thumbnail) }}" width="250px">
            @endif 
        </div>    
    @endif
    <!-- Show the thumbnail while editing the details -->
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

	<!-- Show the thumbnail while editing the details -->
	@if(isset($design) && $design->regular_thumbnail != "" && file_exists('storage/designs/'.$design->id.'/'.$design->regular_thumbnail))	  	
    	<div class="form-group">
            <?php list($width, $height) = getimagesize('storage/designs/'.$design->id.'/'.$design->regular_thumbnail); ?>
            @if($width < $height)
              <img alt="{{ $design->regular_thumbnail }}" src="{{ asset('storage/designs/'.$design->id.'/'.$design->regular_thumbnail) }}" height="250px">
            @else
              <img alt="{{ $design->regular_thumbnail }}" src="{{ asset('storage/designs/'.$design->id.'/'.$design->regular_thumbnail) }}" width="250px">
            @endif 
        </div>    
    @endif
    <!-- Show the thumbnail while editing the details -->
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

	<!-- Show design's preview image(s) while editing the details -->
	@if(isset($design) && is_array($design->preview_img))  	
    	<div class="form-group">
    		@foreach($design->preview_img as $img)
	            <?php list($width, $height) = getimagesize('storage/designs/'.$design->id.'/'.$img); ?>
	            @if($width < $height)
	              <img alt="{{ $img }}" src="{{ asset('storage/designs/'.$design->id.'/'.$img) }}" height="150px">
	            @else
	              <img alt="{{ $img }}" src="{{ asset('storage/designs/'.$design->id.'/'.$img) }}" width="150px">
	            @endif  
	        @endforeach
        </div>    
    @endif
    <!-- Show design's preview image(s) while editing the details -->
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

	<!-- Show design's preview image(s) while editing the details -->
	@if(isset($design) && $design->help_document != "")  	
    	<span class="fg-field-notification" style="width: 100%">*Currently uploaded document: 
    		<a target="_blank" href="{{ asset('storage/designs/'.$design->id.'/'.$design->help_document) }}">{{ $design->help_document }}</a>
    	</span>   
    @endif
    <!-- Show design's preview image(s) while editing the details -->
	<!-- HELP DOCUMENT -->
	
	<!-- Form group -->
    <div class="form-group">
        <span class="fg-title">Tags</span>
        <!-- Select2 wrapper -->
        <div class="select-two-wrapper">
        	{!! Form::select('tag_id[]', $tags, $design->tags, ['data-placeholder' => 'Select one or multiple tags', 'multiple' => true, 'class'=>'multiple-select']) !!}
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