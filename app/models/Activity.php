<?php

<<<<<<< HEAD
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Activity extends Eloquent implements UserInterface, RemindableInterface {
=======
class Activity extends Eloquent {
>>>>>>> yoni

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activties';

}