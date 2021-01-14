@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Update District Information</h4>
		  <p class="mg-b-0">Update the district related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update District Information</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('district.update', $district->id) }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>District Name</label>
								<input type="text" name="name" class="form-control" autocomplete="off" required="required" value="{{ $district->name }}">
							</div>

							<div class="form-group">
								<label>Division Name</label>
								<select class="form-control" name="division_id" required>
									<option value="">Please Select the Division Name</option>
									@foreach ($divisions as $division)
										<option value="{{ $division->id }}" @if ($division->id == $district->division_id) selected @endif>{{ $division->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option value="">Please Select the District Status</option>
									<option value="0" @if ($district->status == 0) selected @endif>Inactive</option>
									<option value="1" @if ($district->status == 1) selected @endif>Active</option>
								</select>
							</div>

							<div class="form-group">
								<input type="submit" name="updateDistrict" class="btn btn-block btn-primary" value="Save Changes">
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