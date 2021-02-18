@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Articulos
					<a class="btn btn-sm btn-primary float-right" 
						href="{{ route('posts.create') }}">
						Crear
					</a>
				</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif

					<table class="table">
						<thead>
						<tr>
							<th>ID</th>
							<th>Titulo</th>
							<th colspan="2">&nbsp;</th>
						</tr>
							<tbody>
								@foreach($posts as $post)
								<tr>
									<td>{{ $post->id }}</td>
									<td>{{ $post->title }}</td>
									<td>
										<a class="btn btn-sm btn-primary" 
											href="{{ route('posts.edit', $post) }}">
											Editar
										</a>
									</td>
									<td>
										<form 
											method="post" 
											action="{{ route('posts.destroy', $post) }}">
											@csrf
											@method('DELETE')
											<input 
												class="btn btn-sm btn-danger"
												type="submit" 
												value="Eliminar" 
												onclick="return confirm('¿Desea Eliminar?')"
											/>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</thead>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
