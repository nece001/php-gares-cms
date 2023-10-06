<?php

namespace Nece\Gears\Cms\Application\Commands\Model\Definition;

use Nece\Gears\Cms\Entity\Model\Definition\ICmsModelDefinitionRepository;
use Nece\Gears\Commands\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

class DeleteCommand extends IntCommandAbstract
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
            'id_list' => 'require'
        ));

        $ids = explode(',', ArrayUtil::getString($params, 'id_list'));

        return $this->cmsModelDefinitionRepository->delete($ids);
    }
}
