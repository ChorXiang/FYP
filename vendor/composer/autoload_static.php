<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2a91508ca692e870298b49f0a9e55cc
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2a91508ca692e870298b49f0a9e55cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2a91508ca692e870298b49f0a9e55cc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite2a91508ca692e870298b49f0a9e55cc::$classMap;

        }, null, ClassLoader::class);
    }
}
