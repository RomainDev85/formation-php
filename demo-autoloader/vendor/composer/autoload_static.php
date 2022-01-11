<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit69dfa4e129fb52b0b98af8f416813e2a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit69dfa4e129fb52b0b98af8f416813e2a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit69dfa4e129fb52b0b98af8f416813e2a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit69dfa4e129fb52b0b98af8f416813e2a::$classMap;

        }, null, ClassLoader::class);
    }
}
