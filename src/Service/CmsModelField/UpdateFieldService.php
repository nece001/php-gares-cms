<?php

namespace Nece\Gears\Cms\Service\CmsModelField;

use Nece\Gears\Cms\CmsException;
use Nece\Util\ArrayUtil;

class UpdateFieldService extends FieldService
{
    /**
     * 更新字段
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-11
     *
     * @param array $params
     *
     * @return CmsModelField
     */
    public function execute(array $params)
    {
        $this->validate->validate($params, array(
            'definition_id' => 'require',
            'title' => 'require',
            'is_disabled' => 'require',
            'sort' => 'require',
            'search_type' => 'require',
            'value_type' => 'require',
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');
        $definition_id = ArrayUtil::getValue($params, 'definition_id', '');;
        $title = ArrayUtil::getValue($params, 'title', '');;
        $is_disabled = ArrayUtil::getValue($params, 'is_disabled', '');;
        $sort = ArrayUtil::getValue($params, 'sort', '');;
        $search_type = ArrayUtil::getValue($params, 'search_type', '');;
        $value_type = ArrayUtil::getValue($params, 'value_type', '');;
        $value_format = ArrayUtil::getValue($params, 'value_format', '');;

        $definition = $this->cmsModelDefinitionRepository->find($definition_id);
        if (!$definition) {
            throw new CmsException('模型定义不存在');
        }

        $field = $definition->makeField($title, $value_type, $value_format, $search_type, $sort, $is_disabled);
        $field->id = $id;

        return $this->cmsModelFieldRepository->createOrUpdate($field);
    }
}
