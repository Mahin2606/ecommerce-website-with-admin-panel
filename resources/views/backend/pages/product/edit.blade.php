@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Update Product Information</h4>
		  <p class="mg-b-0">Update the product related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Product Information</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<!-- Form Start -->
						<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
							<!-- Security Token which stops to embed this from into iframe tag -->
							@csrf

							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Product Title</label>
											<input type="text" name="title" class="form-control" value="{{ $product->title }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Product Display Details</label>
											<textarea class="form-control" name="short_desc" rows="3">{{ $product->short_desc }}</textarea>
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
													<option value="{{ $productBrand->id }}" @if ($product->brand_id == $productBrand->id) selected @endif>{{ $productBrand->name }}</option>
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

													<option value="{{ $parentCat->id }}" @if ($parentCat->id == $product->category_id) selected @endif>{{ $parentCat->name }}</option>

													@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parentCat->id)->where('status', 1)->get() as $childCat)

														<option value="{{ $childCat->id }}" @if ($childCat->id == $product->category_id) selected @endif> - {{ $childCat->name }}</option>

														@foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $childCat->id)->where('status', 1)->get() as $childCatTwo)

															<option value="{{ $childCatTwo->id }}" @if ($childCatTwo->id == $product->category_id) selected @endif>&nbsp; - {{ $childCatTwo->name }}</option>
															
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
												<option value="0" @if ($product->product_type == 0) selected @endif>New</option>
												<option value="1" @if ($product->product_type == 1) selected @endif>Old</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Regular Price</label>
											<input type="text" name="regular_price" class="form-control" value="{{ $product->regular_price }}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Offer Price</label>
											<input type="text" name="offer_price" class="form-control" value="{{ $product->offer_price }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Product Quantity</label>
											<input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Product Sku</label>
											<input type="text" name="sku_code" class="form-control" value="{{ $product->sku_code }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Is Featured?</label>
											<select class="form-control" name="featured_item" required>
												<option value="">Please Select the Featured Status</option>
												<option value="0" @if ($product->featured_item == 0) selected @endif>No</option>
												<option value="1" @if ($product->featured_item == 1) selected @endif>Yes</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Status</label>
											<select class="form-control" name="status" required>
												<option value="">Please Select the Product Status</option>
												<option value="0" @if ($product->status == 0) selected @endif>Inactive</option>
												<option value="1" @if ($product->status == 1) selected @endif>Active</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Tags (Give tags separated by space)</label>
											<input type="text" name="tags" class="form-control" value="{{ $product->tags }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label>Product Image</label>
										<br>
										@if (!is_null($product->image))
								      		<img src="{{ asset('Backend/img/product') }}/{{ $product->image }}" width="70">
								      	@else
								      		No Thumbnail
								      	@endif
								      	<br><br>
										<input type="file" name="image" class="form-control">
										<br>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Product Full Description</label>
											<textarea class="form-control" name="description" rows="7">{{ $product->description }}</textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="submit" name="updateProduct" class="btn btn-block btn-primary" value="Save Changes">
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