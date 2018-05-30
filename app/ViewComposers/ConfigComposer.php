<?php
/**
 * 网站所有配置字段共享变量传递到模板中
 */

namespace App\ViewComposers;


use Cache;
use Illuminate\View\View;
use App\Services\ConfigServices;

/**
 * Class ConfigComposer
 *
 * @package App\ViewComposers
 */
class ConfigComposer
{
	protected $configServices;
	
	public function __construct(ConfigServices $configServices)
	{
		$this->configServices = $configServices;
	}
	
	/**
	 * @param View $view
	 */
	public function compose(View $view)
	{
		$view->with('config' , $this->tranFormConfig());
	}
	
	/**
	 * @return array|mixed
	 */
	public function tranFormConfig()
	{
		if (Cache::get('config')) {
			return Cache::get('config');
		} else {
			$data = $this->configServices->getAll()->toArray();
			$info = [];
			foreach ($data as $value) {
				$info[ $value[ 'key' ] ] = $value[ 'value' ];
			}
			Cache::forever('config' , $info);
			return $info;
		}
	}
}