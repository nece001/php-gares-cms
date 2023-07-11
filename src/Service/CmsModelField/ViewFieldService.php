<?php

namespace Nece\Gears\Cms\Service\CmsModelField;

use Nece\Gears\Cms\CmsException;
use Nece\Util\ArrayUtil;

class ViewFieldService extends FieldService
{
    /**
     * 查看字段
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
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');

        $field = $this->cmsModelFieldRepository->find($id);
        if (!$field) {
            throw new CmsException('字段不存在');
        }

        return $field;
    }
}
