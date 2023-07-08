<?php

namespace Nece\Gears\Cms;

use Nece\Gears\Cms\Entity\CmsModelDefinitionEntity;

/**
 * 仓储接口
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
interface ICmsRepository
{

    public function find($id);

    public function createOrUpdate(array $entities);

    public function delete(CmsModelDefinitionEntity $definition);
}
