<?php

namespace Nece\Gears\Cms\Entity\Subject\Category;

interface ICmsSubjectCategoryRepository
{
    /**
     * 查询分类
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param string $id
     *
     * @return CmsSubjectCategoryEntity|null
     */
    public function find($id): ?CmsSubjectCategoryEntity;

    /**
     * 创建或更新分类
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-08
     *
     * @param CmsSubjectCategoryEntity $entity
     *
     * @return integer
     */
    public function createOrUpdate(CmsSubjectCategoryEntity $entity): int;

    /**
     * 删除分类
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     *
     * @param array $ids
     *
     * @return integer
     */
    public function delete(array $ids): int;

    /**
     * 删除分类
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
     * 获取父级所有子级
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param string $node_no
     *
     * @return array
     */
    public function getAllChildsByParentNodeNo($node_no);

    /**
     * 获取ID节点的前一兄弟节点
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param int $id
     *
     * @return CmsSubjectCategoryEntity
     */
    public function getPreviousSibling($id);

    /**
     * 获取ID节点的后一兄弟节点
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param int $id
     *
     * @return CmsSubjectCategoryEntity
     */
    public function getNextSibling($id);

    /**
     * 获取父级子节点的最大节点序号
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param int $parent_id
     *
     * @return CmsSubjectCategoryEntity
     */
    public function getChildLastNodeOfParent($parent_id);

    /**
     * 获取父级子节点的最大节点序号
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     *
     * @param int $parent_id
     *
     * @return string
     */
    public function getChildMaxNoOfParent($parent_id);
}
