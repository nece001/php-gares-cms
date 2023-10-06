<?php

namespace Nece\Gears\Cms\Application\Commands\Model\Field;

use Nece\Gears\Cms\Application\Consts;
use Nece\Gears\Cms\Entity\Model\Field\ICmsModelFieldRepository;
use Nece\Gears\Commands\ArrayCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

class EditCommand extends ArrayCommandAbstract
{
    /**
     * 模型字段仓储
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
     * @return array
     */
    public function execute(array $params): array
    {
        $data = array(
            'entity' => null,
            'value_type_options' => array(),
            'search_type_options' => array()
        );

        $id     = ArrayUtil::getInt($params, 'id');
        $entity = $this->cmsModelFieldRepository->find($id);

        $data['value_type_options']  = Consts::valueTypeOptions($entity->value_type ?? '');
        $data['search_type_options'] = Consts::searchTypeOptions($entity->search_type ?? '');
        $data['entity']              = $entity;

        return $data;
    }
}
