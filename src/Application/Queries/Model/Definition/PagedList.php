<?php

namespace Nece\Gears\Cms\Application\Queries\Model\Definition;

use Nece\Gears\Cms\Entity\Model\Definition\ICmsModelDefinitionRepository;
use Nece\Gears\Commands\PaginatorCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Gears\Paginator;

/**
 * 分页列表
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-06
 */
class PagedList extends PaginatorCommandAbstract
{

    /**
     * 定义仓储对象
     *
     * @var ICmsModelDefinitionRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     */
    private $cmsModelDefinitionRepository;

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
     * @return Paginator
     */
    public function execute(array $params): Paginator
    {
        return $this->cmsModelDefinitionRepository->pagedList($params);
    }
}
