<?php

class ActivitesController extends BaseController {

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
    	$input = Input::all();
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     * GET http://localhost/laravel/users/1
     */

    public function get($id) {
        $user = Activity::find($id);
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
        $user = Activity::find($id);

        $user->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'Activity Deleted'),
            200
        );
    }

}