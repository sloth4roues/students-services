<?php

use Illuminate\Support\Str;

return [

    /*
    |----------------------------------------------------------------------
    | Default Database Connection Name
    |----------------------------------------------------------------------
    |
    | Ici vous pouvez spécifier quel type de base de données utiliser par
    | défaut pour les opérations de base de données. C'est la connexion 
    | qui sera utilisée à moins qu'une autre connexion soit spécifiée.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),  // Utiliser MySQL par défaut

    /*
    |----------------------------------------------------------------------
    | Database Connections
    |----------------------------------------------------------------------
    |
    | Ici, toutes les connexions à la base de données sont définies. 
    | Vous pouvez ajouter ou supprimer des connexions en fonction de vos besoins.
    |
    */

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),  // Hôte de la base de données MySQL
            'port' => env('DB_PORT', '3306'),  // Port par défaut de MySQL
            'database' => env('DB_DATABASE', 'etudiant-exchange'),  // Remplacez par le nom de votre base
            'username' => env('DB_USERNAME', 'root'),  // Remplacez par votre utilisateur MySQL
            'password' => env('DB_PASSWORD', ''),  // Remplacez par votre mot de passe MySQL
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

    ],

    /*
    |----------------------------------------------------------------------
    | Migration Repository Table
    |----------------------------------------------------------------------
    |
    | Cette table conserve une trace de toutes les migrations déjà exécutées.
    | Grâce à cette information, Laravel peut savoir quelle migration n'a 
    | pas encore été appliquée à la base de données.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |----------------------------------------------------------------------
    | Redis Databases
    |----------------------------------------------------------------------
    |
    | Si vous n'utilisez pas Redis, vous pouvez désactiver cette section ou
    | simplement la laisser telle quelle sans la configuration.
    |
    */

    'redis' => [
        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],
    ],

];
