<?php

namespace Nece\Gears\Cms\Entity\Site;

use Nece\Gears\Paginator;

interface ICmsSiteRepository
{
    /**
     * 根据ID查询
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param integer $id
     *
     * @return CmsSiteEntity
     */
    public function find(int $id): ?CmsSiteEntity;

    /**
     * 创建或更新
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param CmsSiteEntity $entity
     *
     * @return integer
     */
    public function createOrUpload(CmsSiteEntity $entity): int;

    /**
     * 删除
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param array $ids
     *
     * @return integer
     */
    public function delete(array $ids): int;

    /**
     * 分页列表
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param array $params
     *
     * @return Paginator
     */
    public function pagedList(array $params): Paginator;

    /**
     * 全部
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @return array
     */
    public function all(): array;
}
