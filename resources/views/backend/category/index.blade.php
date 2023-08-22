@extends('layouts.backend')
@section('content')

<div class="main-panel">
	<div class="content">
		<div class="container-fluid">
			<h4 class="page-title">Category Page</h4>
			<div class="row">
				<div class="col-md-5">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Category Create</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<form action="{{ route('admin.category.store') }}" method="post">
									@csrf
									<div class="card-body">
										<div class="form-group">
											<label for="name">Category</label>
											<input type="text" class="form-control" name="name" id="name" placeholder="Enter Category">
											@if($errors->has('name'))
											<span style="color: crimson;">{{ ('Please Enter Your Category') }}</span>
											@endif
										</div>
									</div>
									<div class="card-action">
										<button class="btn btn-success">Submit</button>
										<button class="btn btn-danger">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Category List</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Category</th>
											<th>Slug</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($categories as $category)
										<tr>
											<th scope="row">{{ $loop->index + 1 }}</th>
											<td>{{ $category->name }}</td>
											<td>{{ $category->slug }}</td>
											<td>
												<form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
													@csrf
													@method('DELETE')
														<a href="{{ route('admin.category.edit',
														$category->id) }}" class="btn btn-primary">Edit</a>
														<button type="submit" class="btn btn-danger">Delete</button>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection