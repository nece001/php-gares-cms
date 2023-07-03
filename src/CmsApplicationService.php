<?php

namespace Nece\Gears\Cms;

class CmsApplicationService
{

    public function save(array $params)
    {
        $service = new CmsModelService();
        $service->save($params);
    }
}
