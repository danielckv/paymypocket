<?php

class UsersController extends BaseController {

	/**
     * Display all users.
     *
     * @return Response
     */
    public function index() {
        $users = User::all();
        return $users;
    }
    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
    	$input = Input::all();
        
    	$count = User::where('fbId', $input['facebookId']);
    	if($count->count() <= 0){
	    	$user = new User();
	    	
	    	//rows
	        $user->firstname = $input['firstname'];
	        $user->lastname = $input['lastname'];
	        $user->fbToken = $input['token'];
	        $user->fbId = $input['facebookId'];
	        $user->uniqID = uniqid();
	        
	        $user->save();	    	
	        
	        $dataReturned = array('uniq' => $user->uniqID,'exists' => false);
    	} else {
    		$d = $count->first();
	    	$dataReturend = array('uniq' => $d->uniqID,'exists' => true);
    	}
    
        $response = Response::json($dataReturend);
		$response->header('Content-Type', 'application/json');
		return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     * GET http://localhost/laravel/users/1
     */

    public function get($id) {
        $user = User::find($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function delete($id) {
        $user = User::find($id);

        $user->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'User Deleted'),
            200
        );
    }

}