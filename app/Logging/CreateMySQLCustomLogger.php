<?php

namespace App\Logging;

use Monolog\Logger;

class CreateMySQLCustomLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @return \Monolog\Logger
     * @todo
     */
    public function __invoke()
    {
        return new \Logger\Monolog\Handler\MysqlHandler();
    }
}
