@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Crear Articulo</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif

					<form 
						action="{{ route('posts.store') }}"
						method="post"
						enctype="multipart/form-data"
						>
						<div class="form-group">
							<label>Titulo *</label>
							<input class="form-control" type="text" name="title" required>
						</div>

						<div class="form-group">
							<label>Image</label>
							<input type="file" name="file">
						</div>

						<div class="form-group">
							<label>Contenido *</label>
							<textarea class="form-control" name="body" rows="6" required></textarea>
						</div>

						<div class="form-group">
							<label>Contenido Embebido</label>
							<textarea class="form-control" name="iframe"></textarea>
						</div>

						<div class="form-group">
							@csrf
							<input 
								class="btn btn-sm btn-primary"
								type="submit" 
								value="Crear"
							/>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
