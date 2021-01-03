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
						<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Product Title</label>
											<input type="text" name="title" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Product Display Details</label>
											<textarea class="form-control" name="short_desc" rows="3"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>Brand</label>
											<select class="form-control" name="brand_id" required>
												<option value="">Please Select the Product Brand</option>
												@foreach (App\Models\Backend\Brand::orderBy('name', 'asc')->where('status', 1)->get() as $productBrand)
													<option value="{{ $productBrand->id }}">{{ $productBrand->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Category</label>
											<select class="form-control" name="category_id" required>
												<option value="">Please Select the Product Category</option>
												@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->where('status', 1)->get() as $parentCat)

													<option value="{{ $parentCat->id }}">{{ $parentCat->name }}</option>

													@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parentCat->id)->where('status', 1)->get() as $childCat)

														<option value="{{ $childCat->id }}"> - {{ $childCat->name }}</option>

														@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $childCat->id)->where('status', 1)->get() as $childCatTwo)

															<option value="{{ $childCatTwo->id }}">&nbsp; - {{ $childCatTwo->name }}</option>
															
														@endforeach
													@endforeach
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Product Type</label>
											<select class="form-control" name="product_type" required>
												<option value="">Please Select the Product Type</option>
												<option value="0">New</option>
												<option value="1">Old</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Regular Price</label>
											<input type="text" name="regular_price" class="form-control">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Offer Price</label>
											<input type="text" name="offer_price" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Product Quantity</label>
											<input type="text" name="quantity" class="form-control">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Product Sku</label>
											<input type="text" name="sku_code" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Is Featured?</label>
											<select class="form-control" name="featured_item" required>
												<option value="">Please Select the Featured Status</option>
												<option value="0">No</option>
												<option value="1">Yes</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Status</label>
											<select class="form-control" name="status" required>
												<option value="">Please Select the Product Status</option>
												<option value="0">Inactive</option>
												<option value="1">Active</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Tags (Give tags separated by space)</label>
											<input type="text" name="tags" class="form-control">
										</div>
									</div>
									<div class="col-sm-6">
										<label>Product Image</label>
										<input type="file" name="image" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Product Full Description</label>
											<textarea class="form-control" name="description" rows="7"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="submit" name="addProduct" class="btn btn-block btn-primary" value="Add New Product">
										</div>
									</div>
								</div>
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