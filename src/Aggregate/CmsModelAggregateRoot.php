<?php

namespace Nece\Gears\Cms\Aggregate;

use Nece\Gears\Cms\Entity\CmsModelDefinitionEntity;
use Nece\Gears\Cms\Entity\CmsModelFieldEntity;

/**
 * CMS聚合根
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
class CmsModelAggregateRoot
{
    /**
     * 模型定义实体
     *
     * @var CmsModelDefinitionEntiry
     * @Author nece001@163.com
     * @DateTime 2023-07-03
     */
    protected $definition;

    /**
     * 删除的模型定义
     *
     * @var array
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     */
    protected $deleted_definitions = array();

    /**
     * 模型字段实体列表
     *
     * @var array
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     */
    protected $fields = array();

    /**
     * 删除的模型字段
     *
     * @var array
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     */
    protected $deleted_fields = array();

    /**
     * 构建模型定义实体
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param string $title
     * @param boolean $is_disabled
     * @param string $id
     *
     * @return CmsModelDefinitionEntity
     */
    public static function buildDefinition($title, $is_disabled = false, $id = '')
    {
        $item = new CmsModelDefinitionEntity();
        $item->id = $id;
        $item->title = $title;
        $item->is_disabled = $is_disabled;

        return $item;
    }

    /**
     * 设置模型定义实体
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param CmsModelDefinitionEntity $definition
     *
     * @return void
     */
    public function setDefinition(CmsModelDefinitionEntity $definition)
    {
        $this->definition = $definition;
    }

    /**
     * 获取模型定义实体
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @return CmsModelDefinitionEntity
     */
    public function getDefination()
    {
        return $this->definition;
    }

    /**
     * 删除模型定义
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param string $id
     *
     * @return void
     */
    public function deleteDefination($id)
    {
        $item = new CmsModelDefinitionEntity();
        $item->id = $id;
        $this->deleted_definitions[] = $item;
    }

    /**
     * 构建模型字段实体
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param string $title
     * @param string $value_type
     * @param string $value_format
     * @param integer $search_type
     * @param integer $sort
     * @param boolean $is_disabled
     * @param string $id
     *
     * @return CmsModelFieldEntity
     */
    public static function buildField($title, $value_type, $value_format = '', $search_type = 0, $sort = 0, $is_disabled = false, $id = '')
    {
        $item = new CmsModelFieldEntity();
        $item->id = $id;
        $item->title = $title;
        $item->value_type = $value_type;
        $item->value_format = $value_format;
        $item->search_type = $search_type;
        $item->sort = $sort;
        $item->is_disabled = $is_disabled;
    }

    /**
     * 添加模型字段
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param CmsModelFieldEntity $field
     *
     * @return void
     */
    public function addField(CmsModelFieldEntity $field)
    {
        $field->definition_id = $this->definition->id;
        $this->fields[] = $field;
    }

    /**
     * 获取模型字段
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * 删除模型字段
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param string $id
     *
     * @return void
     */
    public function deleteField($id)
    {
        $item = new CmsModelFieldEntity();
        $item->id = $id;
        $this->deleted_fields[] = $item;
    }
}
