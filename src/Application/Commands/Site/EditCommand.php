<?php

namespace Nece\Gears\Cms\Application\Commands\Site;

use Nece\Gears\Cms\Entity\Site\ICmsSiteRepository;
use Nece\Gears\Commands\ArrayCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

/**
 * 保存命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-06
 */
class EditCommand extends ArrayCommandAbstract
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
     * @return array
     */
    public function execute(array $params): array
    {
        $id     = ArrayUtil::getInt($params, 'id');
        $entity = $this->cmsSiteRepository->find($id);

        $data = array(
            'entity' => $entity
        );

        return $data;
    }
}
