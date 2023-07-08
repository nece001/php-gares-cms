<?php

namespace Nece\Gears\Cms\Application;

use Nece\Gears\Cms\Aggregate\CmsModelAggregate;
use Nece\Gears\Cms\Aggregate\CmsModelAggregateRoot;
use Nece\Gears\Cms\Repository\ICmsModelDefinitionRepository;

class CmsModelService
{
    /**
     * 模型存储仓库
     *
     * @var ICmsModelDefinitionRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-02
     */
    private $cmsModelDefinitionRepository;

    public function __construct(ICmsModelDefinitionRepository $cmsModelDefinitionRepository)
    {
        $this->cmsModelDefinitionRepository = $cmsModelDefinitionRepository;
    }

    /**
     * 保存业务方法
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

        $title = $params['title'];
        $is_disabled = $params['is_disabled'];
        $id = $params['id'];

        // 创建实体
        $definition = CmsModelAggregateRoot::buildDefinition($title, $is_disabled, $id);

        // 保存实体
        $this->cmsModelDefinitionRepository->createOrUpdate($definition);
        return $definition;
    }
}
