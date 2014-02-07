<?php


class ActivitiesController extends BaseController {

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

    	$input = Input::All();
    	
    	$activity = new Activity();
    	$activity->credits = $input['credits'];
    	$activity->type = $input['type'];
    	$activity->repeat = $input['repeat'];
    	$activity->desc = $input['desc'];
    	$activity->pocketID = $input['pocketID'];
    	$activity->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     * GET http://localhost/laravel/users/1
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
	    $total = DB::table('activitiesStatus')->
	    	join('activites', 'activitiesStatus.activityID', '=', 'activities.id')
	    	->where(array('activitiesStatus.pocketID' => $input['pocketID'],
	    	'activitiesStatus.status' => 3))->sum('activities.credits');

	    $response = Response::json(array('points' => $total));
		$response->header('Content-Type', 'application/json');
		return $response;
    }

    public function setActivityStatus(){
        $input = Input::All();

        $status = new ActivityStatus();
        $status->activityID = $input['activityID'];
        $status->pocketID = $input['pocketID'];
        $status->status = $input['status'];

        $stats->save();


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