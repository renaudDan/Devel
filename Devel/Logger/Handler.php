<?php

namespace Abc\Devel\Logger;

use Magento\Framework\Logger\Handler\Base as HandlerBase;

class Handler extends HandlerBase
{
    protected $loggerType = \Monolog\Logger::DEBUG;

    protected $fileName = '/var/log/developer.log';
}
