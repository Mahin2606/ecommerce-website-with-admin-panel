@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Create New Product</h4>
		  <p class="mg-b-0">Create new product and add new product related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Product</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>Brand Name</label>
								<input type="text" name="name" class="form-control">
							</div>

							<div class="form-group">
								<label>Brand Description</label>
								<textarea class="form-control" name="description" rows="5"></textarea>
							</div>

							<div class="form-group">
								<label>Is Featured?</label>
								<select class="form-control" name="is_featured" required>
									<option value="">Please Select the Featured Status</option>
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select>
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option value="">Please Select the Brand Status</option>
									<option value="0">Inactive</option>
									<option value="1">Active</option>
								</select>
							</div>

							<div class="form-group">
								<label>Brand Image / Logo</label>
								<input type="file" name="image" class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" name="addBrand" class="btn btn-block btn-primary" value="Add New Brand">
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