<?php

namespace Nece\Gears\Cms\Entity\Model\Field;


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
    public function find($id): ?CmsModelFieldEntity;

    /**
     * 创建或更新模型
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param CmsModelFieldEntity $entity
     *
     * @return integer
     */
    public function createOrUpdate(CmsModelFieldEntity $entity): int;

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
     * 删除模型的所有字段
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-11
     *
     * @param integer $id
     *
     * @return integer
     */
    public function deleteByDefinitionId($id): int;

    /**
     * 定义的字段列表
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param integer $id
     *
     * @return array
     */
    public function listByDefinitionId($id): array;
}
