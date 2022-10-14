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
		/**webphone license */
		$webphoneLicence   = Licence::where('app', 'webphone')->first();
		$webphone          = [
			'install'      => file_exists('/var/www/voipiran/webphone/.env'),
			'licence'      => ($webphoneLicence) ? true : false,
			'installLabel' => (file_exists('/var/www/voipiran/webphone/.env')) ? 'Installed' : 'No Install',
			'licenceLabel' => ($webphoneLicence) ? $webphoneLicence->type : 'No License',
			'percent'      => (($webphoneLicence) ? ($webphoneLicence->type == 'full' ? '100%' : '5%') : '5%'),
			'icon'         => (($webphoneLicence) && (file_exists('/var/www/voipiran/webphone/.env'))) ? 'mdi-check' : 'mdi-close'
		];

		/**survey license */
		$surveyLicence     = 'No Licence';
		$survey = [
			'install'      => false,
			'licence'      => false,
			'installLabel' => 'No Install',
			'licenceLabel' => $surveyLicence,
			'percent'      => '5%',
			'icon'         => 'mdi-close'
		];

		/**autodialer license */
		$autodialerLicence = 'No Licence';
		$autodialer = [
			'install'      => false,
			'licence'      => false,
			'installLabel' => 'No Install',
			'licenceLabel' => $autodialerLicence,
			'percent'      => '5%',
			'icon'         => 'mdi-close'
		];

		/**call request license */
		$callReqeustLicence   = Licence::where('app', 'callrequest')->first();
		$callRequest = [
			'install'      => file_exists('/var/www/html/voipiran/dialer/dial.php'),
			'licence'      => ($callReqeustLicence) ? true : false,
			'installLabel' => file_exists('/var/www/html/voipiran/dialer/dial.php') ? 'Installed' : 'no Installed',
			'licenceLabel' => ($callReqeustLicence) ? $callReqeustLicence->type : "No License",
			'percent'      => (($callReqeustLicence) ? ($callReqeustLicence->type == 'full' ? '100%' : '5%') : '5%'),
			'icon'         => (($callReqeustLicence) && (file_exists('/var/www/html/voipiran/dialer/dial.php'))) ? 'mdi-check' : 'mdi-close'
		];

		/**Call stats license */
		$callStatsLicense   = Licence::where('app', 'call_stat_plus')->first();
		$existFileStats = file_exists('/var/www/voipiran/stats/.env');
		$callStats = [
			'install'      => $existFileStats,
			'licence'      => ($callStatsLicense) ? true : false,
			'installLabel' => $existFileStats ? 'Installed' : 'no Installed',
			'licenceLabel' => ($callStatsLicense) ? $callStatsLicense->type : "No License",
			'percent'      => (($callStatsLicense) ? ($callStatsLicense->type == 'full' ? '100%' : '5%') : '5%'),
			'icon'         => (($callStatsLicense) && ($existFileStats)) ? 'mdi-check' : 'mdi-close'
		];


		/**irouting license */
		$iroutingLicense   = Licence::where('app', 'irouting')->first();
		$existFileRouting = file_exists('/var/www/voipiran/irouting/.env');
		$irouting = [
			'install'      => $existFileRouting,
			'licence'      => ($iroutingLicense) ? true : false,
			'installLabel' => $existFileRouting ? 'Installed' : 'no Installed',
			'licenceLabel' => ($iroutingLicense) ? $iroutingLicense->type : "No License",
			'percent'      => (($iroutingLicense) ? ($iroutingLicense->type == 'full' ? '100%' : '5%') : '5%'),
			'icon'         => (($iroutingLicense) && $existFileRouting) ? 'mdi-check' : 'mdi-close'
		];


		/**number formatter license */
		$numberFormatterLicense   = Licence::where('app', 'number_formatter')->first();
		$existFileNumberFormatter = file_exists('/var/www/voipiran/number-formatter/.env');
		$numberFormatter = [
			'install'      => $existFileNumberFormatter,
			'licence'      => ($numberFormatterLicense) ? true : false,
			'installLabel' => $existFileNumberFormatter ? 'Installed' : 'no Installed',
			'licenceLabel' => ($numberFormatterLicense) ? $numberFormatterLicense->type : "No License",
			'percent'      => (($numberFormatterLicense) ? ($numberFormatterLicense->type == 'full' ? '100%' : '5%') : '5%'),
			'icon'         => (($numberFormatterLicense) && $existFileNumberFormatter) ? 'mdi-check' : 'mdi-close'
		];

		return view('index', [
			'webphone'    => (object)$webphone,
			'survey'      => (object)$survey,
			'autodialer'  => (object)$autodialer,
			'callRequest' => (object)$callRequest,
			'callStats' => (object)$callStats,
			'irouting' => (object)$irouting,
			'numberFormatter' => (object)$numberFormatter,
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
