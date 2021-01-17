@extends ('backend.layout.template')

@section ('body')

	<div class="br-pagetitle">
		<i class="icon ion-cube"></i>
		<div>
		  <h4>Manage All Sliders</h4>
		  <p class="mg-b-0">Manage all the slider related information.</p>
		</div>
	</div>

	<div class="br-pagebody">
		<div class="row row-sm">
			<div class="col-sm-12 col-xl-12">
				<!-- Body Content - Card Start -->
				<div class="card bd-0 shadow-base">
					<div class="d-md-flex justify-content-between pd-25">
						<div>
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Manage All Sliders</h6>
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
							      <th scope="col">Slider Title</th>
							      <th scope="col">Sub-title</th>
							      <th scope="col">Description</th>
							      <th scope="col">Button Text</th>
							      <th scope="col">Button URL</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody class="table-bordered">
							    
							    @php  $i = 1;  @endphp

							    @foreach ($sliders as $slider)
								    <tr>
								      <th scope="row">{{ $i }}</th>
								      <td>
								      	@if (!is_null($slider->image))
								      		<img src="{{ asset('Backend/img/slider') }}/{{ $slider->image }}" width="40">
								      	@else
								      		No Thumbnail
								      	@endif
								      </td>
								      <td>{{ $slider->title }}</td>
								      <td>{{ $slider->subtitle }}</td>
								      <td>{{ substr($slider->description, 0, 70) . '...' }}</td>
								      <td>{{ $slider->button_text }}</td>
								      <td>{{ $slider->button_url }}</td>
								      <td>
								      	<div class="action-icons">
								      		<ul>
								      			<li><a class="btn btn-info btn-sm" href="{{ route('slider.edit', $slider->id) }}"><i class="fas fa-pencil-alt"></i></a></li>
								      			<li><a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#deleteSlider{{ $slider->id }}"><i class="fas fa-trash"></i></a></li>
								      		</ul>

								      		<!-- Delete Modal Start -->
								      		<div class="modal fade" id="deleteSlider{{ $slider->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this Slider?</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	<form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
											      		@csrf
											      		<div class="action-icons text-center">
											      			<ul>
											      				<li><input type="submit" name="deleteSlider" value="Delete" class="btn btn-danger"></li>
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