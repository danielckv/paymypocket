<?php

class PocketsController extends BaseController {

	/**
     * Display all users.
     *
     * @return Response
     */
    public function index() {
        $activities = Pocket::all();
        return $activities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
    
    	$input = Input::All();
    	
    	$count = Pocket::where('guarantor', $input['userid']);
    	if($count->count() <= 0){
	    	$pocket = new Pocket();
	    	$pocket->guarantor = $input['userid'];
	    	$pocket->identifier = uniqid();
	    	$pocket->save();
	    	
	    	$data = array('pocketID' => $pocket->identifier);
    	} else {
	    	$dd = $count->first();
	    	$data = array('pocketID' => $dd->identifier);
    	}
    	
    	
    	$response = Response::json($data);
		$response->header('Content-Type', 'application/json');
		return $response;
    	
    }

    public function getStatistics($pocketId) {
        
    }
    
    public function connect(){
	    $input = Input::All();
	    $pocket = Pocket::where('identifier', $input['pocket']);
	    if($pocket->count() > 0){
		    $connect = new ConnectPocket();
		    $connect->pocketID = $input['pocket'];
		    $connect->userID = $input['userid'];
		    $connect->save();
		    
		    $dataReturend = array('error' => false);
	    }else{
		    $dataReturend = array('error' => true);
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
        $user = Pocket::find($id);
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
        $user = Pocket::find($id);

        $user->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'Pocket Deleted'),
            200
        );
    }

}