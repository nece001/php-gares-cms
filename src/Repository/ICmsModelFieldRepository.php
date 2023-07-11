<?php

namespace Nece\Gears\Cms\Repository;

use Nece\Gears\Cms\Entity\CmsModelFieldEntity;

/**
 * 模型字段仓储接口
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
interface ICmsModelFieldRepository
{

    /**
     * 查询模型定义
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param string $id
     *
     * @return CmsModelFieldEntity|null
     */
    public function find($id);

    /**
     * 创建或更新模型
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param CmsModelFieldEntity $entity
     *
     * @return CmsModelFieldEntity
     */
    public function createOrUpdate(CmsModelFieldEntity $entity);

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

    /**
     * 删除模型的所有字段
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-11
     *
     * @param string $id
     *
     * @return integer
     */
    public function deleteByDefinitionId($id);
}
