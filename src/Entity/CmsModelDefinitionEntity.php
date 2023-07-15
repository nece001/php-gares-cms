<?php

namespace Nece\Gears\Cms\Entity;

use Nece\Gears\Cms\Service\Category;

/**
 * 模型定义实体
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
class CmsModelDefinitionEntity
{
    public $id;
    public $create_time;
    public $update_time;
    public $is_disabled;
    public $title;

    public $fields = array();

    public function __construct($title, $is_disabled = false, $id = null)
    {
        $this->id = $id;
        $this->is_disabled = $is_disabled;
        $this->title = $title;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function setIsDisabled($value)
    {
        $this->is_disabled = $value;
    }

    public function makeField($title, $value_type, $value_format, $search_type, $sort, $is_disabled)
    {
        $field = new CmsModelFieldEntity();
        $field->title = $title;
        $field->value_type = $value_type;
        $field->value_format = $value_format;
        $field->search_type = $search_type;
        $field->sort = $sort;
        $field->is_disabled = $is_disabled;
        $field->definition_id = $this->id;
        return $field;
    }

    public function makeCategory($parent_id, $title)
    {
        $category = new CmsSubjectCategoryEntity();
        $category->parent_id = $parent_id;
        $category->title = $title;
        $category->model_definition_id = $this->id;
        return $category;
    }
}
