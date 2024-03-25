<?php

spl_autoload_register(function ($className) {
    if (strpos($className, 'YAWPT') !== false) {
        $classPathRaw = get_template_directory() . '/src/' . str_replace('YAWPT', '', $className) . '.php';
        $classPath = str_replace(['/\\', '\\/', '\\','//','/',], DIRECTORY_SEPARATOR, $classPathRaw);
        if (file_exists($classPath)) {
            include $classPath;
        } else {
            wp_die(
                new WP_Error('YAWPT autoload Error', 'Cannot load "' . $className . '"')
            );
        }
    }
});