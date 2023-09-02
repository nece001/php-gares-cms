<?php

namespace Nece\Gears\Cms\Service\CmsModelDefinition;

use Nece\Gears\Cms\Infrastructure\Setting;
use Nece\Gears\Cms\Repository\ICmsModelDefinitionRepository;
use Nece\Gears\IValidator;

abstract class DefinitionService
{
    /**
     * 验证器
     *
     * @var IValidator
     * @Author nece001@163.com
     * @DateTime 2023-07-10
     */
    protected $validator;

    /**
     * 模型存储仓库
     *
     * @var ICmsModelDefinitionRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-02
     */
    protected $cmsModelDefinitionRepository;

    protected $setting;

    public function __construct(IValidator $validator, Setting $setting, ICmsModelDefinitionRepository $cmsModelDefinitionRepository)
    {
        $this->validator = $validator;
        $this->cmsModelDefinitionRepository = $cmsModelDefinitionRepository;
        $this->setting = $setting;
    }

    abstract public function execute(array $params);
}
