<?php

<<<<<<< HEAD
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Pocket extends Eloquent implements UserInterface, RemindableInterface {
=======
class Pocket extends Eloquent {
>>>>>>> yoni

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pockets';

}