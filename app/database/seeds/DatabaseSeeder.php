<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::create('paymypoc', function($table)
		{
		    $table->increments('id');
		});
		
		Eloquent::unguard();
		// $this->call('UserTableSeeder');
	}

}