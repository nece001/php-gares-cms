<?php

namespace Nece\Gears\Cms\Service\CmsModelDefinition;

use Nece\Util\ArrayUtil;

class ViewDefinitionService extends DefinitionService
{
    public function execute(array $params)
    {
        // 校验参数
        $this->validator->validate($params, array(
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');

        var_dump($this->setting->getValue('test1'));

        return $this->cmsModelDefinitionRepository->find($id);
    }
}
