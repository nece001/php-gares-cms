<?php

namespace Nece\Gears\Cms\Service\CmsModelField;

use Nece\Gears\Cms\Repository\ICmsModelDefinitionRepository;
use Nece\Gears\Cms\Repository\ICmsModelFieldRepository;
use Nece\Gears\IValidate;

abstract class FieldService
{
    /**
     * 验证器
     *
     * @var IValidate
     * @Author nece001@163.com
     * @DateTime 2023-07-10
     */
    protected $validate;

    /**
     * 模型存储仓库
     *
     * @var ICmsModelDefinitionRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-02
     */
    protected $cmsModelDefinitionRepository;

    /**
     * 模型字段仓库
     *
     * @var CmsModelFieldRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-10
     */
    protected $cmsModelFieldRepository;

    public function __construct(IValidate $validate, ICmsModelDefinitionRepository $cmsModelDefinitionRepository, ICmsModelFieldRepository $cmsModelFieldRepository)
    {
        $this->validate = $validate;
        $this->cmsModelDefinitionRepository = $cmsModelDefinitionRepository;
        $this->cmsModelFieldRepository = $cmsModelFieldRepository;
    }

    abstract public function execute(array $params);
}
