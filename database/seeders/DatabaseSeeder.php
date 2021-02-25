<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		User::factory()->create([
			'email' => 'designeromega@gmail.com',
			'password' => bcrypt('123456')
		]);
		Note::factory(30)->create();
	}
}
