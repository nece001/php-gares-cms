<?php

namespace Nece\Gears\Cms\Service\CmsSubjectCategory;

use Nece001\PhpCategoryTree\CategoryTreeAbstract;
use Nece\Gears\Cms\Repository\ICmsSubjectCategoryRepository;

class CategoryTree extends CategoryTreeAbstract
{

    /**
     * 分类仓储类
     *
     * @var ICmsSubjectCategoryRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-12
     */
    private $cmsSubjectCategoryRepository;

    public function __construct(ICmsSubjectCategoryRepository $cmsSubjectCategoryRepository)
    {
        $this->cmsSubjectCategoryRepository = $cmsSubjectCategoryRepository;
    }

    /**
     * 创建节点
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-15
     *
     * @param array $data
     *
     * @return array
     */
    public function create(array $data)
    {
        return $this->createNode($data);
    }

    /**
     * 更新节点
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-15
     *
     * @param array $data
     * @param bool $is_parent_changed
     *
     * @return array
     */
    public function update(array $data, $is_parent_changed)
    {
        return $this->updateNode($data, $is_parent_changed);
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
        $row = array();
        $entity = $this->cmsSubjectCategoryRepository->find($id);
        if ($entity) {
            $row = array(
                $this->field_id => $entity->id,
                $this->field_node_level => $entity->node_level,
                $this->field_node_no => $entity->node_no,
                $this->field_node_path => $entity->node_path,
                $this->field_parent_id => $entity->parent_id
            );
        }

        return $row;
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
        foreach ($list as $row) {
            $data[] = array(
                $this->field_id => $row[$this->field_id],
                $this->field_node_level => $row[$this->field_node_level],
                $this->field_node_no => $row[$this->field_node_no],
                $this->field_node_path => $row[$this->field_node_path],
                $this->field_parent_id => $row[$this->field_parent_id],
            );
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
        $row = $this->cmsSubjectCategoryRepository->getPreviousSibling($id);
        if ($row) {
            return array(
                $this->field_id => $row[$this->field_id],
                $this->field_node_level => $row[$this->field_node_level],
                $this->field_node_no => $row[$this->field_node_no],
                $this->field_node_path => $row[$this->field_node_path],
                $this->field_parent_id => $row[$this->field_parent_id],
            );
        }
        return array();
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
        $row = $this->cmsSubjectCategoryRepository->getNextSibling($id);
        if ($row) {
            return array(
                $this->field_id => $row[$this->field_id],
                $this->field_node_level => $row[$this->field_node_level],
                $this->field_node_no => $row[$this->field_node_no],
                $this->field_node_path => $row[$this->field_node_path],
                $this->field_parent_id => $row[$this->field_parent_id],
            );
        }
        return array();
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
        $row = $this->cmsSubjectCategoryRepository->getChildLastNodeOfParent($parent_id);
        if ($row) {
            return $row[$this->field_node_no];
        }
        return '';
    }

    /**
     * 子级列表是否为空
     *
     * @Author nece001@163.com
     * @DateTime 2023-05-11
     *
     * @param mixed $list
     *
     * @return bool
     */
    protected function childListIsEmpty($list)
    {
        return count($list) == 0;
    }
}
