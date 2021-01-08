<?php

\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE, 'Abc_Devel',
    __DIR__
);

if(!function_exists('devel')){
    function devel() {
        $args = func_get_args();
        $logger = \Magento\Framework\App\ObjectManager::getInstance()->get(\Abc\Devel\Logger\Logger::class);
        $caller = debug_backtrace()[0];
        $location = str_replace('/app/app/code/', '', $caller['file']) . ':' . $caller['line'];
        foreach ($args as $arg) {
            $logger->dev($arg, $location);
        }
    }
}
