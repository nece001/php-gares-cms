<?php

namespace Nece\Gears\Cms\Application\Commands\Model\Definition;

use Nece\Gears\Cms\Entity\Model\Definition\CmsModelDefinitionEntity;
use Nece\Gears\Cms\Entity\Model\Definition\ICmsModelDefinitionRepository;
use Nece\Gears\Commands\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

class SaveCommand extends IntCommandAbstract
{

    /**
     * 模型定义仓储
     *
     * @var ICmsModelDefinitionRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     */
    private $cmsModelDefinitionRepository;

    /**
     * 构造
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param IValidator $validator
     * @param ICmsModelDefinitionRepository $cmsModelDefinitionRepository
     */
    public function __construct(IValidator $validator, ICmsModelDefinitionRepository $cmsModelDefinitionRepository)
    {
        parent::__construct($validator);
        $this->cmsModelDefinitionRepository = $cmsModelDefinitionRepository;
    }

    /**
     * 运行
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param array $params
     *
     * @return integer
     */
    public function execute(array $params): int
    {
        $this->validator->validate($params, array(
            'title' => 'require'
        ));

        $entity              = new CmsModelDefinitionEntity();
        $entity->id          = ArrayUtil::getInt($params, 'id');
        $entity->site_id     = ArrayUtil::getInt($params, 'site_id');
        $entity->title       = ArrayUtil::getString($params, 'title');
        $entity->is_disabled = ArrayUtil::getInt($params, 'is_disabled');

        return $this->cmsModelDefinitionRepository->createOrUpdate($entity);
    }
}
