<?php

namespace Nece\Gears\Cms\Application\Queries\Site;

use Nece\Gears\Cms\Entity\Site\ICmsSiteRepository;
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
     * 站点仓储对象
     *
     * @var ICmsSiteRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     */
    private $cmsSiteRepository;

    public function __construct(IValidator $validator, ICmsSiteRepository $cmsSiteRepository)
    {
        parent::__construct($validator);
        $this->cmsSiteRepository = $cmsSiteRepository;
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
        return $this->cmsSiteRepository->pagedList($params);
    }
}
