<?php

namespace Nece\Gears\Cms\Service\CmsSubjectCategory;

use Nece\Gears\Cms\Repository\ICmsSubjectCategoryRepository;
use Nece\Gears\Cms\Service\CmsSubjectCategory\CategoryTree;
use Nece\Gears\IValidate;

abstract class CategoryService
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
     * 分类存储
     *
     * @var ICmsSubjectCategoryRepository
     * @Author nece001@163.com
     * @DateTime 2023-07-15
     */
    protected $cmsSubjectCategoryRepository;

    /**
     * 分类树
     *
     * @var CategoryTree
     * @Author nece001@163.com
     * @DateTime 2023-07-15
     */
    protected $tree;

    public function __construct(IValidate $validate, ICmsSubjectCategoryRepository $cmsSubjectCategoryRepository)
    {
        $this->validate = $validate;
        $this->cmsSubjectCategoryRepository = $cmsSubjectCategoryRepository;

        $this->tree = new CategoryTree($cmsSubjectCategoryRepository);
    }

    abstract public function execute(array $params);
}
