<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf932906c05539a3ad593683f4afefe55
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Controller\\BaseController' => __DIR__ . '/../..' . '/app/controllers/BaseController.php',
        'App\\Controller\\HomeController' => __DIR__ . '/../..' . '/app/controllers/HomeController.php',
        'App\\Controller\\ProductController' => __DIR__ . '/../..' . '/app/controllers/ProductController.php',
        'App\\Controller\\UserController' => __DIR__ . '/../..' . '/app/controllers/UserController.php',
        'App\\Model\\BaseModel' => __DIR__ . '/../..' . '/app/models/BaseModel.php',
        'App\\Model\\Category' => __DIR__ . '/../..' . '/app/models/Category.php',
        'App\\Model\\Product' => __DIR__ . '/../..' . '/app/models/Product.php',
        'App\\Model\\User' => __DIR__ . '/../..' . '/app/models/User.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf932906c05539a3ad593683f4afefe55::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf932906c05539a3ad593683f4afefe55::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf932906c05539a3ad593683f4afefe55::$classMap;

        }, null, ClassLoader::class);
    }
}
