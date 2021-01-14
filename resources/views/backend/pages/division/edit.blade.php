@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Update Division Information</h4>
		  <p class="mg-b-0">Update the division related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Division Information</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('division.update', $division->id) }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf
							<div class="form-group">
								<label>Division Name</label>
								<input type="text" name="name" class="form-control" autocomplete="off" required="required" value="{{ $division->name }}">
							</div>

							<div class="form-group">
								<label>Division Priority No</label>
								<input type="text" name="priority" class="form-control" value="{{ $division->priority }}">
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option value="">Please Select the Division Status</option>
									<option value="0" @if ($division->status == 0) selected @endif>Inactive</option>
									<option value="1" @if ($division->status == 1) selected @endif>Active</option>
								</select>
							</div>

							<div class="form-group text-center">
								<input type="submit" name="updateDivision" class="btn btn-primary" value="Save Changes">
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