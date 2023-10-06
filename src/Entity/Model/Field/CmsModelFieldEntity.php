<?php

namespace Nece\Gears\Cms\Entity\Model\Field;

use Nece\Gears\Entity;

/**
 * 模型字段实体
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
class CmsModelFieldEntity extends Entity
{
    public $id;
    public $create_time;
    public $update_time;
    public $is_disabled;
    public $sort;
    public $definition_id;
    public $search_type;
    public $value_type;
    public $value_format;
    public $title;
}
