<?php

namespace Nece\Gears\Cms\Entity\Model\Definition;

use Nece\Gears\Entity;

/**
 * 模型定义实体
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
class CmsModelDefinitionEntity extends Entity
{
    public $id;
    public $create_time;
    public $update_time;
    public $is_disabled;
    public $site_id;
    public $title;
}
