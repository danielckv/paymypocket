<?php

<<<<<<< HEAD
class ActivitesController extends BaseController {
=======
class ActivitiesController extends BaseController {
>>>>>>> yoni

	/**
     * Display all users.
     *
     * @return Response
     */
    public function index() {
        $activities = Activity::all();
        return $activities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
<<<<<<< HEAD
    	$input = Input::all();
=======
    	$input = Input::All();
    	
    	$activity = new Activity();
    	$activity->credits = $input['credits'];
    	$activity->type = $input['type'];
    	$activity->repeat = $input['repeat'];
    	$activity->desc = $input['desc'];
    	$activity->pocketID = $input['pocketID'];
    	$activity->save();
>>>>>>> yoni
    }

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  int  $id
     * @return Response
     * GET http://localhost/laravel/users/1
     */

    public function get($id) {
        $user = Activity::find($id);
        return $user;
=======
     */

    public function get() {
    	$input = Input::All();
    	
        $activities = Activity::where('pocketID',$input['pocketID']);
        $response = Response::json($activities);
		$response->header('Content-Type', 'application/json');
		return $response;
    }
    
    public function getPoints() {
    	$input = Input::All();
	    $total = DB::table('activitiesStatus')->join('activites', 'activitiesStatus.activityID', '=', 'activities.id')
	    									  ->where(array('activitiesStatus.pocketID' => $input['pocketID'],'activitiesStatus.status' => 3))->sum('activities.credits');

	    $response = Response::json(array('points' => $total));
		$response->header('Content-Type', 'application/json');
		return $response;
>>>>>>> yoni
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
        $user = Activity::find($id);

        $user->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'Activity Deleted'),
            200
        );
    }

}