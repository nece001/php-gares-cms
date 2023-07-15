<?php

namespace Nece\Gears\Cms\Service\CmsSubjectCategory;

use Nece\Gears\Cms\Entity\CmsSubjectCategoryEntity;

class UpdateCategoryService extends CategoryService
{
    /**
     * 更新
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-15
     *
     * @param array $params
     *
     * @return CmsSubjectCategoryEntity
     */
    public function execute(array $params)
    {
        $this->validate->validate($params, array(
            'id' => 'require',
            'parent_id' => 'require',
            'title' => 'require',
        ));

        $id = $params['id'];
        $parent_id = $params['parent_id'];
        $title = $params['title'];

        $node = $this->cmsSubjectCategoryRepository->find($id);

        $is_parent_changed = $node->parent_id != $parent_id;

        $node->title = $title;
        $node->parent_id = $parent_id;
        $row = $node->toArray();

        $rows = $this->tree->update($row, $is_parent_changed);
        foreach ($rows as $row) {
            $node = new CmsSubjectCategoryEntity();
            $node->setAttributes($row);
            return $this->cmsSubjectCategoryRepository->createOrUpdate($node);
        }
    }
}
