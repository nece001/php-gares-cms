<?php

namespace Nece001\Gears\Cms;

/**
 * 仓储接口
 *
 * @Author nece001@163.com
 * @DateTime 2023-07-02
 */
interface ICmsRepository
{

    public function find($id);

    public function save(array $entities);

    public function delete(array $ids);
}
