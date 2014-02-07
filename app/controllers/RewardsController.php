<?php

class RewardsController extends BaseController {

	/**
     * Create new reward record.
     *
     * @return Response
     */
	public function create(){

		$input = Input::All();

		$reward = new Reward();

		$reward->pocketID = $input['pocketID'];
		$reward->credits = $input['credits'];
		$reward->money = $input['money'];

		$reward->save();

	}

	/**
     * Delete Reward by id
     *
     * @param  int  $id
     * @return Response
     */
	public function delete($id){
		$reward = Reward::find($id);

        $reward->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'User Deleted'),
            200
        );
	}

	/**
     * get record by id from database.
     *
     * @return Response
     */
	public function get(){
		$input = Input::All();

		$rewards = Reward::where('pocketID',$input['pocketID']);

		$response = Response::json($rewards);
		$response->header('Content-Type', 'application/json');
		return $response;
	}

}