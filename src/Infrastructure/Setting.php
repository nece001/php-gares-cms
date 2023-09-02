<?php

namespace Nece\Gears\Cms\Infrastructure;

use Nece\Gears\SimpleSetting\Application\SettingApplication;

class Setting
{
    /**
     * 设置类实例
     *
     * @var SettingApplication
     * @Author nece001@163.com
     * @DateTime 2023-09-02
     */
    private $settingApplication;

    public function __construct(SettingApplication $settingApplication)
    {
        $this->settingApplication = $settingApplication;
    }

    public function getValue($key_name)
    {
        $params = array('key_name' => $key_name);
        return $this->settingApplication->getValue($params);
    }
}
