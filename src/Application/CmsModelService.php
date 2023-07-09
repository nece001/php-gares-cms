<?php

namespace Nece\Gears\Cms\Application;

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
     * 保存模型定义（保存业务方法）
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-02
     *
     * @param array $params
     *
     * @return CmsModelAggregateRoot
     */
    public function save(array $params)
    {
        // 校验参数

        $title = $params['title'];
        $is_disabled = $params['is_disabled'];
        $id = $params['id'];

        $cmsModelAggregateRoot = new CmsModelAggregateRoot();

        // 创建实体
        $definition = CmsModelAggregateRoot::buildDefinition($title, $is_disabled, $id);
        $cmsModelAggregateRoot->setDefinition($definition);

        // 保存实体
        $this->cmsModelDefinitionRepository->createOrUpdate($definition);
        return $cmsModelAggregateRoot;
    }

    /**
     * 获取模型定义详情
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-09
     *
     * @param array $params
     *
     * @return CmsModelAggregateRoot
     */
    public function detail(array $params)
    {
        $id = $params['id'];

        $definition = $this->cmsModelDefinitionRepository->find($id);

        if ($definition) {
            $cmsModelAggregateRoot = new CmsModelAggregateRoot();
            $cmsModelAggregateRoot->setDefinition($definition);
            return $cmsModelAggregateRoot;
        }

        return null;
    }

    /**
     * 删除模型定义
     *
     * @Author nece001@163.com
     * @DateTime 2023-07-09
     *
     * @param array $params
     *
     * @return void
     */
    public function delete(array $params)
    {
        $id = $params['id'];

        $cmsModelAggregateRoot = new CmsModelAggregateRoot();
        $cmsModelAggregateRoot->deleteDefination($id);

        foreach ($cmsModelAggregateRoot->getDeletedDefinations() as $definition) {
            $this->cmsModelDefinitionRepository->delete($definition);
        }
    }
}
