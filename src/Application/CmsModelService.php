<?php

namespace Nece\Gears\Cms\Application;

use Nece\Gears\Cms\Aggregate\CmsModelAggregateRoot;
use Nece\Gears\Cms\CmsException;
use Nece\Gears\Cms\Entity\CmsModelDefinitionEntity;
use Nece\Gears\Cms\Entity\CmsModelFieldEntity;
use Nece\Gears\Cms\Entity\CmsModelFieldValueEntity;
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


        // 创建实体
        $definition = new CmsModelDefinitionEntity();
        $definition->title = $title;
        $definition->is_disabled = $is_disabled;
        $definition->id = $id;

        // 保存实体
        $this->cmsModelDefinitionRepository->createOrUpdate($definition);
        return $definition;
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
            return $definition;
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

        $definition = new CmsModelDefinitionEntity();
        $definition->id = $id;

        $this->cmsModelDefinitionRepository->delete($definition);
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

        $field = new CmsModelFieldEntity();
        $field->title = $title;
        $field->value_type = $value_type;
        $field->value_format = $value_format;
        $field->search_type = $search_type;
        $field->sort = $sort;
        $field->is_disabled = $is_disabled;
        $field->id = $id;

        $this->cmsModelFieldRepository->createOrUpdate($field);
    }

    public function detailField(array $params)
    {
        $this->validate->validate($params, array(
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');

        $field = $this->cmsModelFieldRepository->find($id);

        if ($field) {
            return $field;
        }

        return null;
    }

    public function deleteField(array $params)
    {
        $this->validate->validate($params, array(
            'id' => 'require',
        ));

        $id = ArrayUtil::getValue($params, 'id', '');
        $field = new CmsModelFieldEntity();
        $field->id = $id;

        $this->cmsModelFieldRepository->delete($field);
    }
}
