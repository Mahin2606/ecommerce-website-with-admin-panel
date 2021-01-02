@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Create New Category</h4>
		  <p class="mg-b-0">Create new category and add new category related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Category</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>Category Name</label>
								<input type="text" name="name" class="form-control">
							</div>

							<div class="form-group">
								<label>Category Description</label>
								<textarea class="form-control" name="description" rows="5"></textarea>
							</div>

							<div class="form-group">
								<label>Primary Category (Please select one if this is a sub-category)</label>
								<select class="form-control" name="is_parent">
									<option value="0">Please Select the Primary Category</option>
									@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->get() as $parentCat)
										<option value="{{ $parentCat->id }}">{{ $parentCat->name }}</option>
										@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parentCat->id)->get() as $childCat)
											<option value="{{ $childCat->id }}"> - {{ $childCat->name }}</option>
											@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $childCat->id)->get() as $childCatTwo)
												<option value="{{ $childCatTwo->id }}">&nbsp; - {{ $childCatTwo->name }}</option>
											@endforeach
										@endforeach
									@endforeach
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
								<label>Category Image / Logo</label>
								<input type="file" name="image" class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" name="addCategory" class="btn btn-block btn-primary" value="Add New Category">
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