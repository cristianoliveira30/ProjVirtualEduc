<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4be48c58841736bd7f43773dc6b4e115
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carliane\\ProjBibliVirtual\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carliane\\ProjBibliVirtual\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4be48c58841736bd7f43773dc6b4e115::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4be48c58841736bd7f43773dc6b4e115::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4be48c58841736bd7f43773dc6b4e115::$classMap;

        }, null, ClassLoader::class);
    }
}