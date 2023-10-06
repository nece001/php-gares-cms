<?php

namespace Nece\Gears\Cms\Entity\Model\Definition;

use Nece\Gears\Paginator;

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
     * @return CmsModelDefinitionEntity
     */
    public function find($id): ?CmsModelDefinitionEntity;

    /**
     * 创建或更新模型
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param CmsModelDefinitionEntity $entity
     *
     * @return integer
     */
    public function createOrUpdate(CmsModelDefinitionEntity $entity): int;

    /**
     * 删除模型
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param array $ids
     *
     * @return integer
     */
    public function delete(array $ids): int;

    /**
     * 分页
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param array $params
     *
     * @return Paginator
     */
    public function pagedList(array $params): Paginator;
}
