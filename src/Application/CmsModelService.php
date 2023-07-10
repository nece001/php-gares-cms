<?php

namespace Nece\Gears\Cms\Application;

use Nece\Gears\Cms\Aggregate\CmsModelAggregateRoot;
use Nece\Gears\Cms\Repository\ICmsModelDefinitionRepository;
use Nece\Gears\Cms\Repository\ICmsModelFieldRepository;
use Nece\Gears\IValidate;

class CmsModelService
{

    /**
     * 验证器
     *
     * @var IValidate
     * @Author nece001@163.com
     * @DateTime 2023-07-10
     */
    private $validate;

    /**
     * 模型存储仓库
     *
     * @var ICmsModelDefinitionRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-02
     */
    private $cmsModelDefinitionRepository;

    /**
     * 模型字段仓库
     *
     * @var CmsModelFieldRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-10
     */
    private $cmsModelFieldRepository;

    public function __construct(IValidate $validate, ICmsModelDefinitionRepository $cmsModelDefinitionRepository, ICmsModelFieldRepository $cmsModelFieldRepository)
    {
        $this->validate = $validate;
        $this->cmsModelDefinitionRepository = $cmsModelDefinitionRepository;
        $this->cmsModelFieldRepository = $cmsModelFieldRepository;
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
        $this->validate->validate($params, array(
            'title'=>'require',
            'is_disabled'=>'require',
        ));

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

    public function saveField(array $params)
    {
        $id = $params['id'];
        $definition_id = $params['definition_id'];
        $title = $params['title'];
        $is_disabled = $params['is_disabled'];
        $sort = $params['sort'];
        $search_type = $params['search_type'];
        $value_type = $params['value_type'];
        $value_format = $params['value_format'];

        $definition = CmsModelAggregateRoot::buildDefinition('', 0, $definition_id);
        $field = CmsModelAggregateRoot::buildField($title, $value_type, $value_format, $search_type, $sort, $is_disabled, $id);

        $cmsModelAggregateRoot = new CmsModelAggregateRoot();
        $cmsModelAggregateRoot->setDefinition($definition);
        $cmsModelAggregateRoot->addField($field);

        foreach ($cmsModelAggregateRoot->getFields() as $field) {
            $this->cmsModelFieldRepository->createOrUpdate($field);
        }
    }
}
