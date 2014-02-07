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
    	if($count->count() <= 0) {
	    	$pocket = new Pocket();
	    	$pocket->guarantor = $input['userid'];
	    	$pocket->identifier = uniqid();
	    	$pocket->save();
	    	
	    	$data = array('pocketID' => $pocket->identifier);
    	} 
        else
        {
	    	$dd = $count->first();
	    	$data = array('pocketID' => $dd->identifier);
    	}
    	
    	$response = Response::json($data);
		$response->header('Content-Type', 'application/json');
		return $response;
    }

    /**
     * Get statistics on specific pocket
     *
     * @param  int  $pocketId
     * @return Response
     */
    public function getStatistics() {
        $input = Input::All();
        $weekFuture = date("Y-m-d");
        $lastWeek   = date("Y-m-d", strtotime("-1 week"));
        $stats = DB::table('activitiesStatus')->
            join('activites', 'activitiesStatus.activityID', '=', 'activities.id')
            ->where(array('activitiesStatus.pocketID' => $input['pocketId'],
            'activitiesStatus.status' => 3))
            ->where('activitiesStatus.updated_at', '<', $weekFuture)
            ->where('activitiesStatus.updated_at', '>', $lastWeek)
            ->sum('activities.credits');
        
        $response = Response::json($stats);
        $response->header('Content-Type', 'application/json');
        return $response;
    }
    
    /**
     * connecting new pocket to the application
     *
     * @return Response
     */
    public function connect(){

	    $input = Input::All();
	    $pocket = Pocket::where('identifier', $input['pocket']);
	    if($pocket->count() > 0) {
		    $connect = new ConnectPocket();
		    $connect->pocketID = $input['pocket'];
		    $connect->userID = $input['userid'];
		    $connect->save();
		    
		    $dataReturend = array('error' => false);
	    }
        else
        {
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