<?php

namespace Nece001\Gears\Cms\Aggregate;

use Nece001\Gears\Cms\Entity\CmsModelEntiry;

/**
 * CMS聚合根
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
class CmsModelAggregate
{

    public $id;
    public $models = array();
    public $delete_ids = array();
    public $find_id;

    public function find($id)
    {
        $this->find_id = $id;
    }

    public function save(CmsModelEntiry $entiry)
    {
        if (isset($this->models[$entiry->id])) {
            $this->models[$entiry->id] = $entiry;
        } else {
            $this->models[] = $entiry;
        }
    }

    public function delete(array $ids)
    {
        $this->delete_ids = array_merge($this->delete_ids, $ids);
    }
}
