<?php

namespace Nece\Gears\Cms\Entity\Site;

use Nece\Gears\Entity;

/**
 * 站点实体
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-06
 */
class CmsSiteEntity extends Entity
{
    public $id;
    public $create_time;
    public $update_time;
    public $title;
    public $url;
}
