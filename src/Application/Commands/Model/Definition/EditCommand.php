<?php

namespace Nece\Gears\Cms\Application\Commands\Model\Definition;

use Nece\Gears\Cms\Entity\Model\Definition\ICmsModelDefinitionRepository;
use Nece\Gears\Cms\Entity\Site\ICmsSiteRepository;
use Nece\Gears\Commands\ArrayCommandAbstract;
use Nece\Gears\IValidator;
use Nece\Util\ArrayUtil;

class EditCommand extends ArrayCommandAbstract
{
    /**
     * 模型定义仓储
     *
     * @var ICmsModelDefinitionRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     */
    private $cmsModelDefinitionRepository;

    /**
     * 站点仓储
     *
     * @var ICmsSiteRepository
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     */
    private $cmsSiteRepository;

    /**
     * 构造
     *
     * @Author nece001@163.com
     * @DateTime 2023-10-06
     *
     * @param IValidator $validator
     * @param ICmsModelDefinitionRepository $cmsModelDefinitionRepository
     */
    public function __construct(IValidator $validator, ICmsModelDefinitionRepository $cmsModelDefinitionRepository, ICmsSiteRepository $cmsSiteRepository)
    {
        parent::__construct($validator);
        $this->cmsModelDefinitionRepository = $cmsModelDefinitionRepository;
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
        $data = array(
            'entity' => null,
            'site_options' => array()
        );

        $id = ArrayUtil::getInt($params, 'id');
        $entity = $this->cmsModelDefinitionRepository->find($id);
        $sites = $this->cmsSiteRepository->all();
        $site_options = array();
        foreach ($sites as $site) {
            $site_options[] = array(
                'value'    => $site->id,
                'text'     => $site->title,
                'selected' => $entity ? ($entity->site_id == $site->id) : false
            );
        }

        $data['entity'] = $entity;
        $data['site_options'] = $site_options;

        return $data;
    }
}
