@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Editar Articulo</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif

					<form 
						action="{{ route('posts.update', $post) }}"
						method="post"
						enctype="multipart/form-data"
						>
						<div class="form-group">
							<label>Titulo *</label>
							<input 
								class="form-control" 
								type="text" 
								name="title" required 
								value="{{ old('title', $post->title) }}"
							/>
						</div>

						<div class="form-group">
							<label>Image</label>
							<input type="file" name="file">
						</div>

						<div class="form-group">
							<label>Contenido *</label>
							<textarea 
								class="form-control" 
								name="body" 
								rows="6" 
								required
								>{{ old('body', $post->body) }}</textarea>
						</div>

						<div class="form-group">
							<label>Contenido Embebido</label>
							<textarea 
								class="form-control" 
								name="iframe">{{ old('inframe', $post->iframe) }}</textarea>
						</div>

						<div class="form-group">
							@csrf
							@method('PUT')
							<input 
								class="btn btn-sm btn-primary"
								type="submit" 
								value="Actualizar"
							/>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
