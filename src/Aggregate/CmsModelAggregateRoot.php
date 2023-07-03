<?php

namespace Nece\Gears\Cms\Aggregate;

use Nece\Gears\Cms\Entity\CmsModelEntity;
use Nece\Gears\Cms\Entity\CmsModelFieldEntity;

/**
 * CMS聚合根
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
class CmsModelAggregateRoot
{
    public $id;

    /**
     * 模型实体
     *
     * @var CmsModelEntiry
     * @Author nece001@163.com
     * @DateTime 2023-07-03
     */
    public $model;

    public $fields = array();
    public $delete_field_ids = array();

    public function __construct(CmsModelEntity $entity = null, $id)
    {
        $this->model = is_null($entity) ? new CmsModelEntity() : $entity;
        $this->id = $id;
    }

    public function setTitle(string $value)
    {
        $this->model->title = $value;
    }

    public function setIsDisabled(bool $value)
    {
        $this->model->is_disabled = $value;
    }

    public function saveField(CmsModelFieldEntity $entity)
    {
        foreach ($this->fields as $field) {
            if ($field !== $entity) {
                $this->fields[] = $entity;
            }
        }
    }

    public function deleteField(array $ids)
    {
        $this->delete_field_ids = array_unique(array_merge($this->delete_field_ids, $ids));
    }
}
