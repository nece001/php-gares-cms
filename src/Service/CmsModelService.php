<?php

namespace Nece001\Gears\Cms;

use Nece001\Gears\Cms\Aggregate\CmsModelAggregate;
use Nece001\Gears\Cms\Entity\CmsModelEntiry;

class CmsModelService
{
    /**
     * 模型存储仓库
     *
     * @var ICmsModelRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-02
     */
    private $cmsModelRepository;

    /**
     * 保存
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-02
     *
     * @param array $params
     *
     * @return CmsModelAggregate
     */
    public function save(array $params)
    {
        // 校验参数
        
        // 创建实体
        $cmsModelEntirt = new CmsModelEntiry();
        $cmsModelEntirt->id = isset($params['id']) ? $params['id'] : null;
        $cmsModelEntirt->title = isset($params['title']) ? $params['title'] : '';

        // 创建聚合
        $cmsModelAggregate = new CmsModelAggregate();
        $cmsModelAggregate->save($cmsModelEntirt);

        // 保存
        $this->cmsModelRepository->save($cmsModelAggregate);

        return $cmsModelAggregate;
    }
}
