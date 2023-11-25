<?php

namespace Nece\Gears\Cms\Application\Commands\Subject\Category;

use Nece\Gears\Cms\Entity\Subject\Category\CmsSubjectCategoryEntity;
use Nece\Gears\Cms\Entity\Subject\Category\ICmsSubjectCategoryRepository;
use Nece\Gears\Commands\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

/**
 * 保存命令
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-09
 */
class SaveCommand extends IntCommandAbstract
{
    /**
     * 分类仓储对象
     *
     * @var ICmsSubjectCategoryRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-09
     */
    private $cmsSubjectCategoryRepository;

    private $tree;

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
        $this->tree = new Tree($cmsSubjectCategoryRepository);
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
            'model_definition_id' => 'require',
            'parent_id' => 'require',
            'title' => 'require',
        ));

        $id = ArrayUtil::getInt($params, 'id');
        $model_definition_id = ArrayUtil::getInt($params, 'model_definition_id');
        $parent_id = ArrayUtil::getInt($params, 'parent_id');
        $title = ArrayUtil::getString($params, 'title');

        $entity = null;
        if ($id) {
            $entity = $this->cmsSubjectCategoryRepository->find($id);
        }

        if (!$entity) {
            $entity = new CmsSubjectCategoryEntity();
            $entity->model_definition_id = $model_definition_id;
            $entity->parent_id = $parent_id;
            $entity->title = $title;
        }



        return $this->cmsSubjectCategoryRepository->createOrUpdate($entity);
    }
}
