<?php

namespace Nece001\Gears\Cms;

class CmsApplicationService
{

    public function save(array $params)
    {
        $service = new CmsModelService();
        $service->save($params);
    }
}
