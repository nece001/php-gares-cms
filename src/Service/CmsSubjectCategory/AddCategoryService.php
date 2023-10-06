<?php

namespace Nece\Gears\Cms\Service\CmsSubjectCategory;

use Nece\Gears\Cms\Entity\CmsSubjectCategoryEntity;

class AddCategoryService extends CategoryService
{
    /**
     * 添加
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
        $this->validator->validate($params, array(
            'model_definition_id' => 'require',
            'title' => 'require',
            'parent_id' => 'require',
        ));

        $params = $this->tree->create($params);

        $node = new CmsSubjectCategoryEntity();
        $node->model_definition_id = $params['model_definition_id'];
        $node->parent_id = $params['parent_id'];
        $node->node_level = $params['node_level'];
        $node->node_no = $params['node_no'];
        $node->node_path = $params['node_path'];
        $node->title = $params['title'];

        return $this->cmsSubjectCategoryRepository->createOrUpdate($node);
    }
}
