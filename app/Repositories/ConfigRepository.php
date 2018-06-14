<?php

namespace App\Repositories;

use App\Models\Config;

/**
 * Class ConfigRepository
 *
 * @package App\Repositories
 */
class ConfigRepository
{
    /**
     * @var config
     */
    private $config;

    /**
     * ConfigRepository constructor.
     *
     * @param $config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->config->all();
    }

    /**
     * @param $key
     * @param $value
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create($key, $value)
    {
        $data = ['key' => $key, 'value' => $value];

        return $this->config->create($data);
    }

    /**
     * 根据字段名来更新系统配置
     * @param $key
     * @param $value
     * @return bool
     */
    public function updateByName($key, $value)
    {
        return $this->config->where("key", $key)->update(["value" => $value]);
    }
}