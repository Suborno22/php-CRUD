<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1dc852e0662081ba4859c7e1b190ec77
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Ubuntu\\PhpFolder\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ubuntu\\PhpFolder\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1dc852e0662081ba4859c7e1b190ec77::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1dc852e0662081ba4859c7e1b190ec77::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1dc852e0662081ba4859c7e1b190ec77::$classMap;

        }, null, ClassLoader::class);
    }
}