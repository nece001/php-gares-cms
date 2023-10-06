<?php

namespace Nece\Gears\Cms\Application\Commands\Model\Field;

use Nece\Gears\Cms\Entity\Model\Field\CmsModelFieldEntity;
use Nece\Gears\Cms\Entity\Model\Field\ICmsModelFieldRepository;
use Nece\Gears\Commands\IntCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

class SaveCommand extends IntCommandAbstract
{

    /**
     * 模型定义仓储
     *
     * @var ICmsModelFieldRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     */
    private $cmsModelFieldRepository;

    /**
     * 构造
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param IValidator $validator
     * @param ICmsModelFieldRepository $cmsModelFieldRepository
     */
    public function __construct(IValidator $validator, ICmsModelFieldRepository $cmsModelFieldRepository)
    {
        parent::__construct($validator);
        $this->cmsModelFieldRepository = $cmsModelFieldRepository;
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

        $entity                = new CmsModelFieldEntity();
        $entity->id            = ArrayUtil::getInt($params, 'id');
        $entity->sort          = ArrayUtil::getInt($params, 'sort');
        $entity->title         = ArrayUtil::getString($params, 'title');
        $entity->is_disabled   = ArrayUtil::getInt($params, 'is_disabled');
        $entity->definition_id = ArrayUtil::getInt($params, 'definition_id');
        $entity->search_type   = ArrayUtil::getInt($params, 'search_type');
        $entity->value_type    = ArrayUtil::getString($params, 'value_type');
        $entity->value_format  = ArrayUtil::getString($params, 'value_format');

        return $this->cmsModelFieldRepository->createOrUpdate($entity);
    }
}
