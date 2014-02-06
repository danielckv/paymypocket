<?php

class UsersController extends BaseController {

	public function addUser()
    {
        $user = new User;
		$user->email = 'John';
		$user->username = 'John';
		$user->save();
    }

    public function getUserEmail($email)
    {
        echo User::where('email', '=', $email)->firstOrFail();
    }
}