<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd371bae4a8b78fc24e7f23aacab9cf93
{
    public static $files = array (
        '19a7e2c3b1d506dcdc1b60aab8e102e4' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/shortcuts.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/public',
        ),
    );

    public static $classMap = array (
        'Tracy\\Bar' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Bar/Bar.php',
        'Tracy\\BlueScreen' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/BlueScreen/BlueScreen.php',
        'Tracy\\Bridges\\Nette\\Bridge' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Nette/Bridge.php',
        'Tracy\\Bridges\\Nette\\MailSender' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Nette/MailSender.php',
        'Tracy\\Bridges\\Nette\\TracyExtension' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Nette/TracyExtension.php',
        'Tracy\\Bridges\\Psr\\PsrToTracyLoggerAdapter' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Psr/PsrToTracyLoggerAdapter.php',
        'Tracy\\Bridges\\Psr\\TracyToPsrLoggerAdapter' => __DIR__ . '/..' . '/tracy/tracy/src/Bridges/Psr/TracyToPsrLoggerAdapter.php',
        'Tracy\\Debugger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Debugger/Debugger.php',
        'Tracy\\DefaultBarPanel' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Bar/DefaultBarPanel.php',
        'Tracy\\Dumper' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Dumper/Dumper.php',
        'Tracy\\FireLogger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Logger/FireLogger.php',
        'Tracy\\Helpers' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Helpers.php',
        'Tracy\\IBarPanel' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Bar/IBarPanel.php',
        'Tracy\\ILogger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Logger/ILogger.php',
        'Tracy\\Logger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/Logger/Logger.php',
        'Tracy\\OutputDebugger' => __DIR__ . '/..' . '/tracy/tracy/src/Tracy/OutputDebugger/OutputDebugger.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd371bae4a8b78fc24e7f23aacab9cf93::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd371bae4a8b78fc24e7f23aacab9cf93::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd371bae4a8b78fc24e7f23aacab9cf93::$classMap;

        }, null, ClassLoader::class);
    }
}
