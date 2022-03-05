<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Licence;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$webphoneLicence   = Licence::where('app' , 'webphone')->first();
		$surveyLicence     = 'No Licence';
		$autodialerLicence = 'No Licence';
		$webphone          = [
			'install'      => file_exists('/var/www/voipiran/webphone/.env'),
			'licence'      => ($webphoneLicence) ? true : false,
			'installLabel' => (file_exists('/var/www/voipiran/webphone/.env')) ? 'Installed' : 'No Install',
			'licenceLabel' => ($webphoneLicence) ? $webphoneLicence->type : 'No Licence',
			'percent'      => (($webphoneLicence) ? ($webphoneLicence->type == 'full' ? '100%' : '5%') : '5%'),
			'icon'         =>  (($webphoneLicence) && (file_exists('/var/www/voipiran/webphone/.env'))) ? 'mdi-check' : 'mdi-close'
		];
		$survey = [
			'install'      => false,
			'licence'      => false,
			'installLabel' => 'No Install',
			'licenceLabel' => $surveyLicence,
			'percent'      => '5%',
			'icon'         => 'mdi-close'
		];
		$autodialer = [
			'install'      => false,
			'licence'      => false,
			'installLabel' => 'No Install',
			'licenceLabel' => $autodialerLicence,
			'percent'      => '5%' ,
			'icon'         => 'mdi-close'
		];

		return view('index', [
			'webphone'   => (object)$webphone,
			'survey'     => (object)$survey,
			'autodialer' => (object)$autodialer
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
