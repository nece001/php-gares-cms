<?php

namespace Nece\Gears\Cms\Repository;

use Nece\Gears\Cms\Entity\CmsModelDefinitionEntity;

/**
 * 模型定义仓储接口
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
interface ICmsModelDefinitionRepository
{

    /**
     * 查询模型定义
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param string $id
     *
     * @return CmsModelDefinitionEntity|null
     */
    public function find($id);

    /**
     * 创建或更新模型
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param CmsModelDefinitionEntity $entity
     *
     * @return CmsModelDefinitionEntity
     */
    public function createOrUpdate(CmsModelDefinitionEntity $entity);

    /**
     * 删除模型
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param string $id
     *
     * @return integer
     */
    public function deleteById($id);
}
