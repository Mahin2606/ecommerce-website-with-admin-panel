@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Update Brand Information</h4>
		  <p class="mg-b-0">Update the brand related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Brand Information</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>Brand Name</label>
								<input type="text" name="name" class="form-control" value="{{ $brand->name }}">
							</div>

							<div class="form-group">
								<label>Brand Description</label>
								<textarea class="form-control" name="description" rows="5">{{ $brand->description }}</textarea>
							</div>

							<div class="form-group">
								<label>Is Featured?</label>
								<select class="form-control" name="is_featured" required>
									<option value="">Please Select the Featured Status</option>
									<option value="0" @if ($brand->is_featured == 0) selected @endif>No</option>
									<option value="1" @if ($brand->is_featured == 1) selected @endif>Yes</option>
								</select>
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option value="">Please Select the Brand Status</option>
									<option value="0" @if ($brand->status == 0) selected @endif>Inactive</option>
									<option value="1" @if ($brand->status == 1) selected @endif>Active</option>
								</select>
							</div>

							<div class="form-group">
								<label>Brand Image / Logo</label>
								<br>
								@if (!is_null($brand->image))
						      		<img src="{{ asset('Backend/img/brand') }}/{{ $brand->image }}" width="70">
						      	@else
						      		No Thumbnail
						      	@endif
						      	<br><br>
								<input type="file" name="image" class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" name="updateBrand" class="btn btn-block btn-primary" value="Save Changes">
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