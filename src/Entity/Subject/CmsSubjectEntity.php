<?php

namespace Nece\Gears\Cms\Entity;

/**
 * 主题实体
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
class CmsSubjectEntity
{
    public $id;
    public $create_time;
    public $update_time;
    public $publish_time;
    public $is_draft;
    public $is_disabled;
    public $is_published;
    public $sort;
    public $model_id;
    public $title;
    public $keyword;
    public $description;
}
