<?php

namespace App\Repositories;

use App\Models\EmailConfig;

/**
 * Class EmailConfigRepository
 *
 * @package App\Repositories
 */
class EmailConfigRepository
{
	/**
	 * @var EmailConfig
	 */
	private $emailConfig;
	
	/**
	 * EmailConfigRepository constructor.
	 *
	 * @param EmailConfig $emailConfig
	 */
	public function __construct(EmailConfig $emailConfig)
	{
		$this->emailConfig = $emailConfig;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		$arr = array('MAIL_DRIVER'=>env('MAIL_DRIVER'),'SEND_CLOUD_USER'=>env('SEND_CLOUD_USER'),'SEND_CLOUD_KEY'=>env('SEND_CLOUD_KEY'),'MAIL_HOST'=>env('MAIL_HOST'),'MAIL_USERNAME'=>env('MAIL_USERNAME'),'MAIL_PASSWORD'=>env('MAIL_PASSWORD'),'MAIL_FROM_ADDRESS'=>env('MAIL_FROM_ADDRESS'),'MAIL_FROM_NAME'=>env('MAIL_FROM_NAME'));
		return $arr;
//		return $this->emailConfig->all();
	}

	
	public function update($id , $data)
	{
		return $this->emailConfig->where('id' , $id)->update($data);
	}
	

}