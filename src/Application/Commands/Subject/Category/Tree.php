<?php

namespace Nece\Gears\Cms\Application\Commands\Subject\Category;

use Nece001\PhpCategoryTree\CategoryTreeAbstract;
use Nece\Gears\Cms\Entity\Subject\Category\ICmsSubjectCategoryRepository;

class Tree extends CategoryTreeAbstract
{
    /**
     * 分类仓储对象
     *
     * @var ICmsSubjectCategoryRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     */
    private $cmsSubjectCategoryRepository;

    /**
     * 构造
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     *
     * @param ICmsSubjectCategoryRepository $cmsSubjectCategoryRepository
     */
    public function __construct(ICmsSubjectCategoryRepository $cmsSubjectCategoryRepository)
    {
        $this->cmsSubjectCategoryRepository = $cmsSubjectCategoryRepository;
    }

    /**
     * 创建
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     *
     * @param array $row
     *
     * @return array
     */
    public function create(array $row)
    {
        $row = $this->createNode($row);
    }

    /**
     * 更新
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     *
     * @param array $row
     * @param integer $parent_id
     *
     * @return array
     */
    public function update(array $row, $parent_id)
    {
        if ($row) {
            $is_parent_changed = $row['parent_id'] != $parent_id;
            $row['parent_id'] = $parent_id;
            $items = $this->updateNode($row, $is_parent_changed);
            $items[] = $row;
        }
    }

    /**
     * 移动
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     *
     * @param integer $id
     * @param integer $up
     *
     * @return void
     */
    public function move($id, $up)
    {
        $rows = $this->exchangeNodeNo($id, $up);
    }

    /**
     * 根据ID获取记录
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param int $id
     *
     * @return array
     */
    public function getById($id)
    {
        $entity = $this->cmsSubjectCategoryRepository->find($id);
        return $entity ? $entity->toArray() : array();
    }

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
    public function getAllChildsByParentNodeNo($node_no)
    {
        $data = array();
        $list = $this->cmsSubjectCategoryRepository->getAllChildsByParentNodeNo($node_no);
        foreach ($list as $entity) {
            $data[] = $entity->toArray();
        }

        return $data;
    }


    /**
     * 获取ID节点的前一兄弟节点
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param int $id
     *
     * @return array
     */
    protected function getPreviousSibling($id)
    {
        $entity = $this->cmsSubjectCategoryRepository->getPreviousSibling($id);
        return $entity ? $entity->toArray() : array();
    }

    /**
     * 获取ID节点的后一兄弟节点
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param int $id
     *
     * @return array
     */
    protected function getNextSibling($id)
    {
        $entity = $this->cmsSubjectCategoryRepository->getNextSibling($id);
        return $entity ? $entity->toArray() : array();
    }

    /**
     * 获取父级子节点的最大节点序号
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param int $parent_id
     *
     * @return string
     */
    protected function getChildMaxNoOfParent($parent_id)
    {
        return $this->cmsSubjectCategoryRepository->getChildMaxNoOfParent($parent_id);
    }

    /**
     * 子级列表是否为空
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param array $list
     *
     * @return bool
     */
    protected function childListIsEmpty($list)
    {
        return empty($list);
    }
}
