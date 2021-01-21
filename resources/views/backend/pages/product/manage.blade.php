@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Manage All Products</h4>
		  <p class="mg-b-0">Manage all the products related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Products</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<div class="bd rounded table-responsive">
							<!-- Table Start -->
							<table class="table table-striped table-hover">
							  <thead class="table-info">
							    <tr>
							      <th scope="col" width="1%">#SL</th>
							      <th scope="col">Image</th>
							      <th scope="col">Title</th>
							      <th scope="col" width="23%">Short Details</th>
							      <th scope="col">Brand</th>
							      <th scope="col" width="8%">Category</th>
							      <th scope="col">Quantity</th>
							      <th scope="col">Regular Price</th>
							      <th scope="col">Offer Price</th>
							      <th scope="col" width="5%">Is Featured?</th>
							      <th scope="col">Status</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody class="table-bordered">
							    
							    @php  $i = 1;  @endphp

							    @foreach ($products as $product)
								    <tr>
								      <th scope="row">{{ $i }}</th>
								      <td>
								      	@if (!is_null($product->image))
								      		<img src="{{ asset('Backend/img/product') }}/{{ $product->image }}" width="40">
								      	@else
								      		No Thumbnail
								      	@endif
								      </td>
								      <td>{{ $product->title }}</td>
								      <td>{{ $product->short_desc }}</td>
								      <td>{{ $product->brand->name }}</td>
								      <td>{{ $product->category->name }}</td>
								      <td>{{ $product->quantity }} Pcs</td>
								      <td>{{ $product->regular_price }} BDT</td>
								      <td>{{ $product->offer_price }} BDT</td>
								      <td>
								      	@if ($product->featured_item == 1)
								      		<span class="badge badge-primary">Yes</span>
								      	@else
								      		<span class="badge badge-warning">No</span>
								      	@endif
								      </td>
								      <td>
								      	@if ($product->status == 1)
								      		<span class="badge badge-success">Active</span>
								      	@else
								      		<span class="badge badge-danger">Inactive</span>
								      	@endif
								      </td>
								      <td>
								      	<div class="action-icons">
								      		<ul>
								      			<li><a class="btn btn-info btn-sm" href="{{ route('product.edit', $product->id) }}"><i class="fas fa-pencil-alt"></i></a></li>
								      			<li><a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#deleteProduct{{ $product->id }}"><i class="fas fa-trash"></i></a></li>
								      		</ul>

								      		<!-- Delete Modal Start -->
								      		<div class="modal fade" id="deleteProduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this Product?</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	<form action="{{ route('product.destroy', $product->id) }}" method="POST">
											      		@csrf
											      		<div class="action-icons text-center">
											      			<ul>
											      				<li><input type="submit" name="deleteProduct" value="Delete" class="btn btn-danger"></li>
											      				<li><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button></li>
											      			</ul>
											      		</div>
											      	</form>
											      </div>
											    </div>
											  </div>
											</div>
								      		<!-- Delete Modal End -->
								      	</div>
								      </td>
								    </tr>

							    @php $i++; @endphp

							    @endforeach

							  </tbody>
							</table>
							<!-- Table End -->
						</div>
					</div>
		    	</div>
				<!-- Body Content - Card End -->
			</div>
		</div>
	</div>

@endsection