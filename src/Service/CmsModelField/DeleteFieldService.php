<?php

namespace Nece\Gears\Cms\Service\CmsModelField;

use Nece\Util\ArrayUtil;

class DeleteFieldService extends FieldService
{
    /**
     * 删除字段
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-11
     *
     * @param array $params
     *
     * @return integer
     */
    public function execute(array $params)
    {
        $this->validate->validate($params, array(
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');

        return $this->cmsModelFieldRepository->deleteById($id);
    }
}
