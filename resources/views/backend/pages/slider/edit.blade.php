@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Update Slider Information</h4>
		  <p class="mg-b-0">Update the slider related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Slider Information</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>Slider Title</label>
								<input type="text" name="title" class="form-control" value="{{ $slider->title }}">
							</div>

							<div class="form-group">
								<label>Slider Sub-title</label>
								<input type="text" name="subtitle" class="form-control" value="{{ $slider->subtitle }}">
							</div>

							<div class="form-group">
								<label>Slider Description</label>
								<textarea class="form-control" name="description" rows="5">{{ $slider->description }}</textarea>
							</div>

							<div class="form-group">
								<label>Slider Button Text</label>
								<input type="text" name="button_text" class="form-control" value="{{ $slider->button_text }}">
							</div>

							<div class="form-group">
								<label>Slider Button URL</label>
								<input type="text" name="button_url" class="form-control" value="{{ $slider->button_url }}">
							</div>

							<div class="form-group">
								<label>Slider Image</label>
								<br>
								@if (!is_null($slider->image))
						      		<img src="{{ asset('Backend/img/slider') }}/{{ $slider->image }}" width="70">
						      	@else
						      		No Thumbnail
						      	@endif
						      	<br><br>
								<input type="file" name="image" class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" name="updateSlider" class="btn btn-block btn-primary" value="Save Changes">
							</div>
						</form>
						<!-- Form End -->
					</div>
		    	</div>
				<!-- Body Content - Card End -->
			</div>
		</div>
	</div>

@endsection