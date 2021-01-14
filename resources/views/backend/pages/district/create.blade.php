@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Create New District</h4>
		  <p class="mg-b-0">Create new district and add new district related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New District</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('district.store') }}" method="POST">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>District Name</label>
								<input type="text" name="name" class="form-control">
							</div>

							<div class="form-group">
								<label>Division Name</label>
								<select class="form-control" name="division_id" required>
									<option value="">Please Select the Division Name</option>
									@foreach ($divisions as $division)
										<option value="{{ $division->id }}">{{ $division->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option value="">Please Select the Division Status</option>
									<option value="0">Inactive</option>
									<option value="1">Active</option>
								</select>
							</div>

							<div class="form-group">
								<input type="submit" name="addDistrict" class="btn btn-block btn-primary" value="Add New District">
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