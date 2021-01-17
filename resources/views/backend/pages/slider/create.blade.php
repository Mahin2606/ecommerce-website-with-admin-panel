@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Create New Slider</h4>
		  <p class="mg-b-0">Create new slider and add new slider related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Slider</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>Slider Title</label>
								<input type="text" name="title" class="form-control">
							</div>

							<div class="form-group">
								<label>Slider Sub-title</label>
								<input type="text" name="subtitle" class="form-control">
							</div>

							<div class="form-group">
								<label>Slider Description</label>
								<textarea class="form-control" name="description" rows="5"></textarea>
							</div>

							<div class="form-group">
								<label>Slider Button Text</label>
								<input type="text" name="button_text" class="form-control">
							</div>

							<div class="form-group">
								<label>Slider Button URL</label>
								<input type="text" name="button_url" class="form-control">
							</div>

							<div class="form-group">
								<label>Slider Image</label>
								<input type="file" name="image" class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" name="addSlider" class="btn btn-block btn-primary" value="Add New Slider">
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