<?php

namespace Nece\Gears\Cms\Service\CmsModelDefinition;

use Nece\Gears\Cms\Repository\ICmsModelDefinitionRepository;
use Nece\Gears\IValidate;

abstract class DefinitionService
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

    public function __construct(IValidate $validate, ICmsModelDefinitionRepository $cmsModelDefinitionRepository)
    {
        $this->validate = $validate;
        $this->cmsModelDefinitionRepository = $cmsModelDefinitionRepository;
    }

    abstract public function execute(array $params);
}
