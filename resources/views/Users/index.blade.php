<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

	<!-- Styles -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  </head>
  <body>
	<div class="container">
			<div class="row">
				<div class="col-sm-8 mx-auto">
				<div class="card border-0 shadow">
					<form action="{{ route('users.store') }}" method="post">
						<div class="card-body">
							@if($errors->any())
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
								- {{ $error }} <br/>
								@endforeach
							</div>
							@endif
							<div class="form-row">
								<div class="col-sm-3">
									<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" />
								</div>
								<div class="col-sm-4">
									<input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
								</div>
								<div class="col-sm-3">
									<input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" />
								</div>
								<div class="col-auto">
									@csrf
									<input 
										type="submit" 
										value="Send" 
										class="btn btn-primary"
										onclick="return confirm('Do you want to save the data?')"
									/>
								</div>
							</div>
						</div>
					</form>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<form action="{{ route('users.destroy', $user) }}" method="post">
									@method('DELETE')
									@csrf
									<input 
										type="submit" 
										value="Delete" 
										class="btn btn-sm btn-danger"
										onclick="return confirm('Are you sure to delete the user {{ $user->name }}?')"
									/>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
		</div>

  </body>
</html>
