<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite196f54325958f5021577444767bfab3
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'D365\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'D365\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite196f54325958f5021577444767bfab3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite196f54325958f5021577444767bfab3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
