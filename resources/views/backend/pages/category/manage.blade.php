@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Manage All Categories</h4>
		  <p class="mg-b-0">Manage all the category related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Categories</h6>
						</div>
					</div>

					<div class="pd-l-25 pd-r-15 pd-b-25">
						<div class="bd rounded table-responsive">
							<!-- Table Start -->
							<table class="table table-striped table-hover">
							  <thead class="table-info">
							    <tr>
							      <th scope="col">#SL</th>
							      <th scope="col">Image</th>
							      <th scope="col">Name</th>
							      <th scope="col">Slug</th>
							      <th scope="col">Description</th>
							      <th scope="col">Category / Sub-Category?</th>
							      <th scope="col">Status</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody class="table-bordered">
							    
							    @php  $i = 1;  @endphp

							    @foreach ($categories as $category)

							    @if ($category->is_parent == 0)
							    	<tr>
								      <th scope="row">{{ $i }}</th>
								      <td>
								      	@if (!is_null($category->image))
								      		<img src="{{ asset('Backend/img/category') }}/{{ $category->image }}" width="40">
								      	@else
								      		No Thumbnail
								      	@endif
								      </td>
								      <td>{{ $category->name }}</td>
								      <td>{{ $category->slug }}</td>
								      <td>{{ $category->description }}</td>
								      <td>
								      	@if ($category->is_parent == 0)
								      		<span class="badge badge-success">Base Category</span>
								      	@else
								      		<span class="badge badge-warning">{{ $category->parent->name }}</span>
								      	@endif
								      </td>
								      <td>
								      	@if ($category->status == 1)
								      		<span class="badge badge-info">Active</span>
								      	@else
								      		<span class="badge badge-danger">Inactive</span>
								      	@endif
								      </td>
								      <td>
								      	<div class="action-icons">
								      		<ul>
								      			<li><a class="btn btn-info btn-sm" href="{{ route('category.edit', $category->id) }}"><i class="fas fa-pencil-alt"></i></a></li>
								      			<li><a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#deleteCategory{{ $category->id }}"><i class="fas fa-trash"></i></a></li>
								      		</ul>

								      		<!-- Delete Modal Start -->
								      		<div class="modal fade" id="deleteCategory{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this Category?</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	<form action="{{ route('category.destroy', $category->id) }}" method="POST">
											      		@csrf
											      		<div class="action-icons text-center">
											      			<ul>
											      				<li><input type="submit" name="deleteCategory" value="Delete" class="btn btn-danger"></li>
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

								    <!-- Sub Category Item Start -->
								    @foreach(App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $category->id)->get() as $subCat)
								    	<tr>
									      <th scope="row">{{ $i }}</th>
									      <td>
									      	@if (!is_null($subCat->image))
									      		<img src="{{ asset('Backend/img/category') }}/{{ $subCat->image }}" width="40">
									      	@else
									      		No Thumbnail
									      	@endif
									      </td>
									      <td>- {{ $subCat->name }}</td>
									      <td>{{ $subCat->slug }}</td>
									      <td>{{ $subCat->description }}</td>
									      <td>
									      	<span class="badge badge-warning">{{ $subCat->parent->name }}</span>
									      </td>
									      <td>
									      	@if ($subCat->status == 1)
									      		<span class="badge badge-info">Active</span>
									      	@else
									      		<span class="badge badge-danger">Inactive</span>
									      	@endif
									      </td>
									      <td>
									      	<div class="action-icons">
									      		<ul>
									      			<li><a class="btn btn-info btn-sm" href="{{ route('category.edit', $subCat->id) }}"><i class="fas fa-pencil-alt"></i></a></li>
									      			<li><a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#deleteCategory{{ $subCat->id }}"><i class="fas fa-trash"></i></a></li>
									      		</ul>

									      		<!-- Delete Modal Start -->
									      		<div class="modal fade" id="deleteCategory{{ $subCat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this Sub-Category?</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	<form action="{{ route('category.destroy', $subCat->id) }}" method="POST">
												      		@csrf
												      		<div class="action-icons text-center">
												      			<ul>
												      				<li><input type="submit" name="deleteSubCategory" value="Delete" class="btn btn-danger"></li>
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

									    <!-- Sub-Category Level 2 Item Start -->
									    @foreach(App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $subCat->id)->get() as $subCatTwo)
									    	<tr>
										      <th scope="row">{{ $i }}</th>
										      <td>
										      	@if (!is_null($subCatTwo->image))
										      		<img src="{{ asset('Backend/img/category') }}/{{ $subCatTwo->image }}" width="40">
										      	@else
										      		No Thumbnail
										      	@endif
										      </td>
										      <td>&nbsp; - {{ $subCatTwo->name }}</td>
										      <td>{{ $subCatTwo->slug }}</td>
										      <td>{{ $subCatTwo->description }}</td>
										      <td>
										      	<span class="badge badge-primary">{{ $subCatTwo->parent->name }}</span>
										      </td>
										      <td>
										      	@if ($subCatTwo->status == 1)
										      		<span class="badge badge-info">Active</span>
										      	@else
										      		<span class="badge badge-danger">Inactive</span>
										      	@endif
										      </td>
										      <td>
										      	<div class="action-icons">
										      		<ul>
										      			<li><a class="btn btn-info btn-sm" href="{{ route('category.edit', $subCatTwo->id) }}"><i class="fas fa-pencil-alt"></i></a></li>
										      			<li><a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#deleteCategory{{ $subCatTwo->id }}"><i class="fas fa-trash"></i></a></li>
										      		</ul>

										      		<!-- Delete Modal Start -->
										      		<div class="modal fade" id="deleteCategory{{ $subCatTwo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													  <div class="modal-dialog">
													    <div class="modal-content">
													      <div class="modal-header">
													        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this Sub-Category?</h5>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
													      <div class="modal-body">
													      	<form action="{{ route('category.destroy', $subCatTwo->id) }}" method="POST">
													      		@csrf
													      		<div class="action-icons text-center">
													      			<ul>
													      				<li><input type="submit" name="deleteSubCategoryTwo" value="Delete" class="btn btn-danger"></li>
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
									    <!-- Sub-Category Level 2 Item End -->

								    @endforeach
								    <!-- Sub Category Item End -->

							    @endif

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