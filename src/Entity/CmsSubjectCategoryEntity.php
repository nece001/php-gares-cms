<?php

namespace Nece\Gears\Cms\Entity;

/**
 * 主题分类实体
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
class CmsSubjectCategoryEntity
{
    public $id;
    public $create_time;
    public $update_time;
    public $model_id;
    public $parent_id;
    public $node_level;
    public $node_no;
    public $node_path;
    public $title;
}
