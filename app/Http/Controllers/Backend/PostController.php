<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::latest()->get();
		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PostRequest $request)
	{
		// Save
		$post = Post::create([
			'user_id' => auth()->user()->id
		] + $request->all());
			//image
		if($request->file('file')){
			$post->image = $request->file('file')
				->store('posts', 'public');
			$post->save();
		}

		//Return
		return back()->with('status','Creado Exitosamente');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
		return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(PostRequest $request, Post $post)
	{
		// Update in Database
		$post->update($request->all());

		if($request->file('file')){
			// Delete old image
			Storage::disk('public')->delete($post->image);
			$post->image = $request->file('file')
				->store('posts', 'public');
			$post->save();
		}
		return back()->with('status', 'Actualizado Correctamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post)
	{
		// Delete Image
		Storage::disk('public')->delete($post->image);
		// Delete from db
		$post->delete();
		return back()->with('status', 'Eliminado con Exito');
	}
}
