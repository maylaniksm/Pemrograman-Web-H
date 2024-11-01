<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb623c3720bd1b2a7ee74384a8c32596b
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitb623c3720bd1b2a7ee74384a8c32596b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb623c3720bd1b2a7ee74384a8c32596b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb623c3720bd1b2a7ee74384a8c32596b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
