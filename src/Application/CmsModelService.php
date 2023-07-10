<?php

namespace Nece\Gears\Cms\Application;

use Nece\Gears\Cms\Aggregate\CmsModelAggregateRoot;
use Nece\Gears\Cms\CmsException;
use Nece\Gears\Cms\Repository\ICmsModelDefinitionRepository;
use Nece\Gears\Cms\Repository\ICmsModelFieldRepository;
use Nece\Gears\IValidate;
use Nece\Util\ArrayUtil;

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
            'title' => 'require',
            'is_disabled' => 'require',
        ));

        $title = ArrayUtil::getValue($params, 'title', '');
        $is_disabled = ArrayUtil::getValue($params, 'is_disabled', '');
        $id = ArrayUtil::getValue($params, 'id', '');

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
        $this->validate->validate($params, array(
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');

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
        $this->validate->validate($params, array(
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');

        $cmsModelAggregateRoot = new CmsModelAggregateRoot();
        $cmsModelAggregateRoot->deleteDefination($id);

        foreach ($cmsModelAggregateRoot->getDeletedDefinations() as $definition) {
            $this->cmsModelDefinitionRepository->delete($definition);
        }
    }

    public function saveField(array $params)
    {
        $this->validate->validate($params, array(
            'definition_id' => 'require',
            'title' => 'require',
            'is_disabled' => 'require',
            'sort' => 'require',
            'search_type' => 'require',
            'value_type' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');
        $definition_id = ArrayUtil::getValue($params, 'definition_id', '');;
        $title = ArrayUtil::getValue($params, 'title', '');;
        $is_disabled = ArrayUtil::getValue($params, 'is_disabled', '');;
        $sort = ArrayUtil::getValue($params, 'sort', '');;
        $search_type = ArrayUtil::getValue($params, 'search_type', '');;
        $value_type = ArrayUtil::getValue($params, 'value_type', '');;
        $value_format = ArrayUtil::getValue($params, 'value_format', '');;

        $definition = $this->cmsModelDefinitionRepository->find($definition_id);
        if (!$definition) {
            throw new CmsException('定义不存在');
        }

        $field = CmsModelAggregateRoot::buildField($title, $value_type, $value_format, $search_type, $sort, $is_disabled, $id);

        $cmsModelAggregateRoot = new CmsModelAggregateRoot();
        $cmsModelAggregateRoot->setDefinition($definition);
        $cmsModelAggregateRoot->addField($field);

        foreach ($cmsModelAggregateRoot->getFields() as $field) {
            $this->cmsModelFieldRepository->createOrUpdate($field);
        }
    }

    public function detailField(array $params)
    {
        $this->validate->validate($params, array(
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');

        $field = $this->cmsModelFieldRepository->find($id);

        if ($field) {
            $cmsModelAggregateRoot = new CmsModelAggregateRoot();
            $cmsModelAggregateRoot->addField($field);
            return $cmsModelAggregateRoot;
        }

        return null;
    }

    public function deleteField(array $params)
    {
        $this->validate->validate($params, array(
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');

        $cmsModelAggregateRoot = new CmsModelAggregateRoot();
        $cmsModelAggregateRoot->deleteField($id);

        foreach ($cmsModelAggregateRoot->getDeletedFields() as $field) {
            $this->cmsModelFieldRepository->delete($field);
        }
    }
}
