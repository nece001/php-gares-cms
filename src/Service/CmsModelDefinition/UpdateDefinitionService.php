<?php

namespace Nece\Gears\Cms\Service\CmsModelDefinition;

use Nece\Gears\Cms\Entity\CmsModelDefinitionEntity;
use Nece\Util\ArrayUtil;

class UpdateDefinitionService extends DefinitionService
{
    public function execute(array $params)
    {
        // 校验参数
        $this->validate->validate($params, array(
            'title' => 'require',
            'is_disabled' => 'require',
            'id' => 'require',
        ));

        $title = ArrayUtil::getValue($params, 'title', '');
        $is_disabled = ArrayUtil::getValue($params, 'is_disabled', '');
        $id = ArrayUtil::getValue($params, 'id', '');

        // 创建实体
        $definition = new CmsModelDefinitionEntity($title, $is_disabled, $id);

        // 保存实体
        return $this->cmsModelDefinitionRepository->createOrUpdate($definition);
    }
}
