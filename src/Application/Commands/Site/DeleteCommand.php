<?php

namespace Nece\Gears\Cms\Application\Commands\Site;

use Nece\Gears\Cms\Entity\Site\ICmsSiteRepository;
use Nece\Gears\Commands\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

/**
 * 删除命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-06
 */
class DeleteCommand extends IntCommandAbstract
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
     * @return integer
     */
    public function execute(array $params): int
    {
        $this->validator->validate($params, array(
            'id_list' => 'require'
        ));

        $ids = explode(',', ArrayUtil::getString($params, 'id_list'));

        return $this->cmsSiteRepository->delete($ids);
    }
}
