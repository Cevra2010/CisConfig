<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd894c0e17f01c8733b7e4fa0842bed3a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cis\\CisConfig\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cis\\CisConfig\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd894c0e17f01c8733b7e4fa0842bed3a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd894c0e17f01c8733b7e4fa0842bed3a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd894c0e17f01c8733b7e4fa0842bed3a::$classMap;

        }, null, ClassLoader::class);
    }
}
