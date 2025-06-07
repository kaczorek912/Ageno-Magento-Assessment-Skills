<?php
return [
    'cache_types' => [
        'compiled_config' => 1,
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'graphql_query_resolver_result' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
    'backend' => [
        'frontName' => 'admin'
    ],
    'cache' => [
        'graphql' => [
            'id_salt' => 'aiMkTrw0wubCuDXWG1m30BpOfQvuvIYa'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => '69d_'
            ],
            'page_cache' => [
                'id_prefix' => '69d_'
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'config' => [
        'async' => 0
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => 'base64I2GG10+WWyrRlG+z7BlDQzgrModt+UsHVXpq7xoN4gs='
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'db',
                'dbname' => 'magento',
                'username' => 'magento',
                'password' => 'magento',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'downloadable_domains' => [
        'localhost'
    ],
    'install' => [
        'date' => 'Fri, 06 Jun 2025 17:24:46 +0000'
    ],
    'static_content_version' => 1749234860
];
