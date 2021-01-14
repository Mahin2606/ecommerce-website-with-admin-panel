@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Create New Division</h4>
		  <p class="mg-b-0">Create new division and add new division related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Division</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('division.store') }}" method="POST">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>Division Name</label>
								<input type="text" name="name" class="form-control" autocomplete="off" required="required">
							</div>

							<div class="form-group">
								<label>Division Priority No</label>
								<input type="text" name="priority" class="form-control">
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option value="">Please Select the Division Status</option>
									<option value="0">Inactive</option>
									<option value="1">Active</option>
								</select>
							</div>

							<br>
							
							<div class="form-group text-center">
								<input type="submit" name="addDivision" class="btn btn-primary" value="Add New Division">
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