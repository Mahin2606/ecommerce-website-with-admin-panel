@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Update Category Information</h4>
		  <p class="mg-b-0">Update the category related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Category Information</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="form-group">
								<label>Category Name</label>
								<input type="text" name="name" class="form-control" value="{{ $category->name }}">
							</div>

							<div class="form-group">
								<label>Category Description</label>
								<textarea class="form-control" name="description" rows="5">{{ $category->description }}</textarea>
							</div>

							<div class="form-group">
								<label>Parent Category</label>
								<select class="form-control" name="is_parent">
									<option value="0">Please Select the Primary Category</option>
									@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->get() as $parentCat)

										<option value="{{ $parentCat->id }}" @if ($parentCat->id == $category->is_parent) selected @endif>{{ $parentCat->name }}</option>

										@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parentCat->id)->get() as $childCat)
											
											<option value="{{ $childCat->id }}" @if ($childCat->id == $category->is_parent) selected @endif> - {{ $childCat->name }}</option>

											@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $childCat->id)->get() as $childCatTwo)
												
												<option value="{{ $childCatTwo->id }}" @if ($childCatTwo->id == $category->is_parent) selected @endif>&nbsp; - {{ $childCatTwo->name }}</option>

											@endforeach
										@endforeach
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option value="">Please Select the Category Status</option>
									<option value="0" @if ($category->status == 0) selected @endif>Inactive</option>
									<option value="1" @if ($category->status == 1) selected @endif>Active</option>
								</select>
							</div>

							<div class="form-group">
								<label>Category Image / Logo</label>
								<br>
								@if (!is_null($category->image))
						      		<img src="{{ asset('Backend/img/category') }}/{{ $category->image }}" width="70">
						      	@else
						      		No Thumbnail
						      	@endif
						      	<br><br>
								<input type="file" name="image" class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" name="updateCategory" class="btn btn-block btn-primary" value="Save Changes">
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