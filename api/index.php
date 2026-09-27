<?php

if (getenv('VERCEL')) {
    $storagePath = '/tmp/laravel-storage';

    foreach (['app', 'framework/cache', 'framework/sessions', 'framework/views', 'logs'] as $directory) {
        $path = $storagePath.'/'.$directory;

        if (! is_dir($path) && ! mkdir($path, 0755, true) && ! is_dir($path)) {
            throw new RuntimeException("Unable to create Laravel storage directory: {$path}");
        }
    }

    foreach ([
        'LARAVEL_STORAGE_PATH' => $storagePath,
        'APP_PACKAGES_CACHE' => $storagePath.'/framework/packages.php',
        'APP_SERVICES_CACHE' => $storagePath.'/framework/services.php',
    ] as $name => $value) {
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
        putenv("{$name}={$value}");
    }
}

require __DIR__.'/../public/index.php';
