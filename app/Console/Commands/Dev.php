<?php

namespace App\Console\Commands;

use App\Licence;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Dev extends Command
{

	/**	
	 * It will Create Voipiran Database if not exists!
	 *
	 * @var string
	 */
	protected $name = 'dev';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'test commands';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		try {
			$data = [
				'license' => "VOIPIRAN_v024T8otR6E5fB30fSP1GROoIB0jC79ct3cxXX65y690y2EfK3q4Q1JG324D013925BoJnrV2qp0M17yPILP7mdA964G6396NjdZ98LJjuRbdf1VrentdAk89b23Hcgp5oTY97454vq6gqw292L1E768OCi0sjzOjx3vs4SsD2qo9OTQk3lp1mJyzACYg9B"
			];
			$url = config('app.licence_endpoint');
			try {
				$res = $this->sendRequest($url , $data);
				if($res['status'] == 200){
					/**success */
					$data                       = json_decode($res['data']);
					$licence                    = $data->license;
					$program                    = $data->program;

					$newLincence                = new Licence;
					$newLincence->app_id        = $licence->id;
					$newLincence->app_name      = $program->name;
					$newLincence->app_verions   = $program->version;
					$newLincence->type          = $licence->license_type;
					$newLincence->status        = 'success';
					$newLincence->licence       = $licence->license;
					$newLincence->customer_name = $licence->person_name;
					$newLincence->company_name  = $licence->name;
					$newLincence->save();
				}

				/**failed */
				$this->comment(dd( $res ));
				
			} catch (\Throwable $th) {
				$this->comment('somthing went wrong');
			}
		} catch (\Throwable $th) {
			$this->comment(dd($th));
		}
	}

	/**
	 * @param string $url the website url
	 * @param array $data the data will pass
	 * @return htmlContent of the website
	 */
	public function sendRequest($url , $data)
	{
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13"); // spoof
			// curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);

			$data = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			// Check the return value of curl_exec(), too
			if ($data === false) {
				throw new Exception('Error Occured On Url ' . $url . "\n" . curl_error($ch));
			}
			curl_close($ch);
			return [
				'data' => $data, 
				'status' => $httpcode
			];
		} catch (\Throwable $th) {
			throw $th;
		}
	}
}
