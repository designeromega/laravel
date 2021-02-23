@extends('layouts.web')

@section('content')
	<div class="grid grid-cols-3 gap-4 ">
		<div class="p-8 bg-gray-200 col-span-1">
			<ul class="flex flex-col">
				<li class="font-medium text-sm text-gray-400 uppercase mb-4">
					Contenido
				</li>
				----
			</ul>
		</div>
		<div class="text-gray-700 col-span-2">
			<img src="{{ $course->image }}" alt="" />
			<h2 class="text-4xl">{{ $course->name }}</h2>
			<p>{{ $course->description }}</p>
			<div class="flex mt-3">
				<img 
					class="h-10 w-10 rounded-full mr-2"
					src="{{ $course->user->avatar }}" 
				/>
				<div>
					<p class="text-gray-500 text-sm">
						{{ $course->user->name }}
					</p>
					<p class="text-gray-500 text-xs">
						{{ $course->created_at->diffForHumans() }}
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="text-center mt-4">
		<h1 class="text-3xl text-gray-700 mb-2 upercase">Ultimos Cursos</h1>
		<h2 class="text-xl text-gray-700">Formate online como profesional en tecnología</h2>
	</div>

	<livewire:course-list>
@endsection
