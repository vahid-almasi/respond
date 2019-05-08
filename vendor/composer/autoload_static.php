<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb90bf1d271f3139658812a290f5c564b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Anetwork\\Respond\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vahid\\Respond\\' =>
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/../..' . '/tests',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb90bf1d271f3139658812a290f5c564b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb90bf1d271f3139658812a290f5c564b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
