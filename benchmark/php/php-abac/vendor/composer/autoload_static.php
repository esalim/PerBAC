<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteee0bc9c29883c4ac776cd1868a3d93a
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\ExpressionLanguage\\' => 37,
        ),
        'I' => 
        array (
            'IPTools\\' => 8,
        ),
        'C' => 
        array (
            'Casbin\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\ExpressionLanguage\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/expression-language',
        ),
        'IPTools\\' => 
        array (
            0 => __DIR__ . '/..' . '/s1lentium/iptools/src',
        ),
        'Casbin\\' => 
        array (
            0 => __DIR__ . '/..' . '/casbin/casbin/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteee0bc9c29883c4ac776cd1868a3d93a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteee0bc9c29883c4ac776cd1868a3d93a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
