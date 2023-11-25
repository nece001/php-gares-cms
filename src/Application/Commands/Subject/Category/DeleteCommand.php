<?php

namespace Nece\Gears\Cms\Application\Commands\Subject\Category;

use Nece\Gears\Cms\Entity\Subject\Category\ICmsSubjectCategoryRepository;
use Nece\Gears\Commands\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

/**
 * 删除命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-09
 */
class DeleteCommand extends IntCommandAbstract
{
    /**
     * 分类仓储对象
     *
     * @var ICmsSubjectCategoryRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     */
    private $cmsSubjectCategoryRepository;

    /**
     * 构造
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     *
     * @param IValidator $validator
     * @param ICmsSubjectCategoryRepository $cmsSubjectCategoryRepository
     */
    public function __construct(IValidator $validator, ICmsSubjectCategoryRepository $cmsSubjectCategoryRepository)
    {
        parent::__construct($validator);
        $this->cmsSubjectCategoryRepository = $cmsSubjectCategoryRepository;
    }

    /**
     * 运行
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-09
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

        $id_list = ArrayUtil::getString($params, 'id_list');
        $ids = explode(',', $id_list);

        return $this->cmsSubjectCategoryRepository->delete($ids);
    }
}
