<?php

namespace Nece\Gears\Cms\Application\Queries\Model\Field;

use Nece\Gears\Cms\Entity\Model\Field\ICmsModelFieldRepository;
use Nece\Gears\Commands\ArrayCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

/**
 * 字段列表
 *
 * @Author nece001@163.com
 * @DateTime 2023-10-06
 */
class FieldList extends ArrayCommandAbstract
{

    /**
     * 定义仓储对象
     *
     * @var ICmsModelFieldRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     */
    private $cmsModelFieldRepository;

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
     * @return array
     */
    public function execute(array $params): array
    {

        $this->validator->validate($params, array(
            'definition_id' => 'require'
        ));

        $definition_id = ArrayUtil::getInt($params, 'definition_id');

        return $this->cmsModelFieldRepository->listByDefinitionId($definition_id);
    }
}
