<?php
return array (
  'doctrine' => 
  array (
    'cache' => 
    array (
      'apc' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\ApcCache',
        'namespace' => 'DoctrineModule',
      ),
      'array' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\ArrayCache',
        'namespace' => 'DoctrineModule',
      ),
      'filesystem' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
        'directory' => 'data/DoctrineModule/cache',
        'namespace' => 'DoctrineModule',
      ),
      'memcache' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
        'instance' => 'my_memcache_alias',
        'namespace' => 'DoctrineModule',
      ),
      'memcached' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
        'instance' => 'my_memcached_alias',
        'namespace' => 'DoctrineModule',
      ),
      'redis' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\RedisCache',
        'instance' => 'my_redis_alias',
        'namespace' => 'DoctrineModule',
      ),
      'wincache' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
        'namespace' => 'DoctrineModule',
      ),
      'xcache' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\XcacheCache',
        'namespace' => 'DoctrineModule',
      ),
      'zenddata' => 
      array (
        'class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
        'namespace' => 'DoctrineModule',
      ),
    ),
    'authentication' => 
    array (
      'odm_default' => 
      array (
      ),
      'orm_default' => 
      array (
        'objectManager' => 'doctrine.entitymanager.orm_default',
        'object_manager' => 'Doctrine\\ORM\\EntityManager',
        'identity_class' => 'RocketUser\\Entity\\User',
        'identity_property' => 'username',
        'credential_property' => 'passwordHash',
      ),
    ),
    'authenticationadapter' => 
    array (
      'odm_default' => true,
      'orm_default' => true,
    ),
    'authenticationstorage' => 
    array (
      'odm_default' => true,
      'orm_default' => true,
    ),
    'authenticationservice' => 
    array (
      'odm_default' => true,
      'orm_default' => true,
    ),
    'connection' => 
    array (
      'orm_default' => 
      array (
        'configuration' => 'orm_default',
        'eventmanager' => 'orm_default',
        'params' => 
        array (
          'host' => 'db01.lundinternational.com',
          'port' => '3306',
          'user' => 'digital_platform',
          'password' => 'rocket11Red',
          'dbname' => 'digital_platform',
        ),
        'driverClass' => 'Doctrine\\DBAL\\Driver\\PDOMySql\\Driver',
      ),
    ),
    'configuration' => 
    array (
      'orm_default' => 
      array (
        'metadata_cache' => 'rocket_memcached',
        'query_cache' => 'rocket_memcached',
        'result_cache' => 'rocket_memcached',
        'hydration_cache' => 'array',
        'driver' => 'orm_default',
        'generate_proxies' => true,
        'proxy_dir' => 'data/DoctrineORMModule/Proxy',
        'proxy_namespace' => 'DoctrineORMModule\\Proxy',
        'filters' => 
        array (
        ),
        'datetime_functions' => 
        array (
        ),
        'string_functions' => 
        array (
        ),
        'numeric_functions' => 
        array (
        ),
      ),
    ),
    'driver' => 
    array (
      'orm_default' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
        'drivers' => 
        array (
          'Application\\Entity' => 'Application_entities',
          'LundProducts\\Entity' => 'LundProducts_entities',
          'LundFeeds\\Entity' => 'LundFeeds_entities',
          'LundCustomer\\Entity' => 'LundCustomer_entities',
          'LundSite\\Entity' => 'LundSite_entities',
          'RocketBase\\Entity' => 'RocketBase_entities',
          'RocketUser\\Entity' => 'RocketUser_entities',
          'RocketCms\\Entity' => 'RocketCms_entities',
          'RocketDam\\Entity' => 'RocketDam_entities',
          'RocketEcom\\Entity' => 'RocketEcom_entities',
          'RocketAdmin\\Entity' => 'RocketAdmin_entities',
        ),
      ),
      'Application_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/module/Application/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'LundProducts_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/module/LundProducts/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'LundFeeds_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/module/LundFeeds/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'LundCustomer_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/module/LundCustomer/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'LundSite_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/module/LundSite/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'RocketBase_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/vendor/Raven3419/RocketBase/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'RocketUser_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/vendor/Raven3419/RocketUser/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'RocketCms_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/vendor/Raven3419/RocketCms/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'RocketDam_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/vendor/Raven3419/RocketDam/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'RocketEcom_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/vendor/Raven3419/RocketEcom/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
      'RocketAdmin_entities' => 
      array (
        'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
        'paths' => '/var/www/SmartDataAdmin/vendor/Raven3419/RocketAdmin/config/doctrine',
        'cache' => 'rocket_memcached',
      ),
    ),
    'entitymanager' => 
    array (
      'orm_default' => 
      array (
        'connection' => 'orm_default',
        'configuration' => 'orm_default',
      ),
    ),
    'eventmanager' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'sql_logger_collector' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'mapping_collector' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'formannotationbuilder' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'entity_resolver' => 
    array (
      'orm_default' => 
      array (
      ),
    ),
    'migrations_configuration' => 
    array (
      'orm_default' => 
      array (
        'directory' => 'data/DoctrineORMModule/Migrations',
        'name' => 'Doctrine Database Migrations',
        'namespace' => 'DoctrineORMModule\\Migrations',
        'table' => 'migrations',
      ),
    ),
    'migrations_cmd' => 
    array (
      'generate' => 
      array (
      ),
      'execute' => 
      array (
      ),
      'migrate' => 
      array (
      ),
      'status' => 
      array (
      ),
      'version' => 
      array (
      ),
      'diff' => 
      array (
      ),
    ),
  ),
  'doctrine_factories' => 
  array (
    'cache' => 'DoctrineModule\\Service\\CacheFactory',
    'eventmanager' => 'DoctrineModule\\Service\\EventManagerFactory',
    'driver' => 'DoctrineModule\\Service\\DriverFactory',
    'authenticationadapter' => 'DoctrineModule\\Service\\Authentication\\AdapterFactory',
    'authenticationstorage' => 'DoctrineModule\\Service\\Authentication\\StorageFactory',
    'authenticationservice' => 'DoctrineModule\\Service\\Authentication\\AuthenticationServiceFactory',
    'connection' => 'DoctrineORMModule\\Service\\DBALConnectionFactory',
    'configuration' => 'DoctrineORMModule\\Service\\ConfigurationFactory',
    'entitymanager' => 'DoctrineORMModule\\Service\\EntityManagerFactory',
    'entity_resolver' => 'DoctrineORMModule\\Service\\EntityResolverFactory',
    'sql_logger_collector' => 'DoctrineORMModule\\Service\\SQLLoggerCollectorFactory',
    'mapping_collector' => 'DoctrineORMModule\\Service\\MappingCollectorFactory',
    'formannotationbuilder' => 'DoctrineORMModule\\Service\\FormAnnotationBuilderFactory',
    'migrations_configuration' => 'DoctrineORMModule\\Service\\MigrationsConfigurationFactory',
    'migrations_cmd' => 'DoctrineORMModule\\Service\\MigrationsCommandFactory',
  ),
  'service_manager' => 
  array (
    'invokables' => 
    array (
      'DoctrineModule\\Authentication\\Storage\\Session' => 'Zend\\Authentication\\Storage\\Session',
      'doctrine.dbal_cmd.runsql' => '\\Doctrine\\DBAL\\Tools\\Console\\Command\\RunSqlCommand',
      'doctrine.dbal_cmd.import' => '\\Doctrine\\DBAL\\Tools\\Console\\Command\\ImportCommand',
      'doctrine.orm_cmd.clear_cache_metadata' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ClearCache\\MetadataCommand',
      'doctrine.orm_cmd.clear_cache_result' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ClearCache\\ResultCommand',
      'doctrine.orm_cmd.clear_cache_query' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ClearCache\\QueryCommand',
      'doctrine.orm_cmd.schema_tool_create' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\SchemaTool\\CreateCommand',
      'doctrine.orm_cmd.schema_tool_update' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\SchemaTool\\UpdateCommand',
      'doctrine.orm_cmd.schema_tool_drop' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\SchemaTool\\DropCommand',
      'doctrine.orm_cmd.convert_d1_schema' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ConvertDoctrine1SchemaCommand',
      'doctrine.orm_cmd.generate_entities' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\GenerateEntitiesCommand',
      'doctrine.orm_cmd.generate_proxies' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\GenerateProxiesCommand',
      'doctrine.orm_cmd.convert_mapping' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ConvertMappingCommand',
      'doctrine.orm_cmd.run_dql' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\RunDqlCommand',
      'doctrine.orm_cmd.validate_schema' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\ValidateSchemaCommand',
      'doctrine.orm_cmd.info' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\InfoCommand',
      'doctrine.orm_cmd.ensure_production_settings' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\EnsureProductionSettingsCommand',
      'doctrine.orm_cmd.generate_repositories' => '\\Doctrine\\ORM\\Tools\\Console\\Command\\GenerateRepositoriesCommand',
      'AssetManager\\Service\\MimeResolver' => 'AssetManager\\Service\\MimeResolver',
    ),
    'factories' => 
    array (
      'doctrine.cli' => 'DoctrineModule\\Service\\CliFactory',
      'Doctrine\\ORM\\EntityManager' => 'DoctrineORMModule\\Service\\EntityManagerAliasCompatFactory',
      'AssetManager\\Service\\AssetManager' => 'AssetManager\\Service\\AssetManagerServiceFactory',
      'AssetManager\\Service\\AssetFilterManager' => 'AssetManager\\Service\\AssetFilterManagerServiceFactory',
      'AssetManager\\Service\\AssetCacheManager' => 'AssetManager\\Service\\AssetCacheManagerServiceFactory',
      'AssetManager\\Service\\AggregateResolver' => 'AssetManager\\Service\\AggregateResolverServiceFactory',
      'AssetManager\\Resolver\\MapResolver' => 'AssetManager\\Service\\MapResolverServiceFactory',
      'AssetManager\\Resolver\\PathStackResolver' => 'AssetManager\\Service\\PathStackResolverServiceFactory',
      'AssetManager\\Resolver\\PrioritizedPathsResolver' => 'AssetManager\\Service\\PrioritizedPathsResolverServiceFactory',
      'AssetManager\\Resolver\\CollectionResolver' => 'AssetManager\\Service\\CollectionResolverServiceFactory',
      'AssetManager\\Resolver\\ConcatResolver' => 'AssetManager\\Service\\ConcatResolverServiceFactory',
      'AssetManager\\Resolver\\AliasPathStackResolver' => 'AssetManager\\Service\\AliasPathStackResolverServiceFactory',
      'ViewResolver' => 'OcraCachedViewResolver\\Factory\\CompiledMapResolverFactory',
      'OcraCachedViewResolver\\Resolver\\OriginalResolver' => 'Zend\\Mvc\\Service\\ViewResolverFactory',
      'OcraCachedViewResolver\\Cache\\ResolverCache' => 'OcraCachedViewResolver\\Factory\\CacheFactory',
      'Aws' => 'Aws\\Factory\\AwsFactory',
      'Aws\\Session\\SaveHandler\\DynamoDb' => 'Aws\\Factory\\DynamoDbSessionSaveHandlerFactory',
    ),
    'abstract_factories' => 
    array (
      'DoctrineModule' => 'DoctrineModule\\ServiceFactory\\AbstractDoctrineServiceFactory',
    ),
    'aliases' => 
    array (
      'mime_resolver' => 'AssetManager\\Service\\MimeResolver',
      'Zend\\View\\Resolver\\AggregateResolver' => 'OcraCachedViewResolver\\Resolver\\OriginalResolver',
      'OcraCachedViewResolver\\Resolver\\CompiledMapResolver' => 'ViewResolver',
    ),
  ),
  'controllers' => 
  array (
    'factories' => 
    array (
      'DoctrineModule\\Controller\\Cli' => 'DoctrineModule\\Service\\CliControllerFactory',
    ),
  ),
  'route_manager' => 
  array (
    'factories' => 
    array (
      'symfony_cli' => 'DoctrineModule\\Service\\SymfonyCliRouteFactory',
    ),
  ),
  'console' => 
  array (
    'router' => 
    array (
      'routes' => 
      array (
        'doctrine_cli' => 
        array (
          'type' => 'symfony_cli',
        ),
        'parse-master' => 
        array (
          'options' => 
          array (
            'route' => 'parse master <filename> [<from_iteration>] [<to_iteration>]',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Parse',
              'action' => 'parsemaster',
            ),
          ),
        ),
        'parse-supplement' => 
        array (
          'options' => 
          array (
            'route' => 'parse supplement <filename>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Parse',
              'action' => 'parsesupplement',
            ),
          ),
        ),
        'parse-assetmigration' => 
        array (
          'options' => 
          array (
            'route' => 'parse assetmigration [<brand>] <filename>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Parse',
              'action' => 'parseassetmigration',
            ),
          ),
        ),
        'parse-copymigration' => 
        array (
          'options' => 
          array (
            'route' => 'parse copymigration [<brand>] <filename>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Parse',
              'action' => 'parsecopymigration',
            ),
          ),
        ),
        'parse-plassetmigration' => 
        array (
          'options' => 
          array (
            'route' => 'parse plassetmigration [<brand>] <filename>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Parse',
              'action' => 'parseplassetmigration',
            ),
          ),
        ),
        'parse-reviewmigration' => 
        array (
          'options' => 
          array (
            'route' => 'parse reviewmigration <filename>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Parse',
              'action' => 'parsereviewmigration',
            ),
          ),
        ),
        'monitor-supplement' => 
        array (
          'options' => 
          array (
            'route' => 'monitor supplement <dirname>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Monitor',
              'action' => 'monitorsupplement',
            ),
          ),
        ),
        'monitor-master' => 
        array (
          'options' => 
          array (
            'route' => 'monitor master <dirname>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Monitor',
              'action' => 'monitormaster',
            ),
          ),
        ),
        'monitor-assets' => 
        array (
          'options' => 
          array (
            'route' => 'monitor assets <dirname>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Monitor',
              'action' => 'monitorassets',
            ),
          ),
        ),
        'parse-assets' => 
        array (
          'options' => 
          array (
            'route' => 'parse assets <dirname>',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Parse',
              'action' => 'parseassets',
            ),
          ),
        ),
        'generate-amazon' => 
        array (
          'options' => 
          array (
            'route' => 'generate amazon [<brand>] (full|incr):generate [<changeset_id>]',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Generate',
              'action' => 'generateamazon',
            ),
          ),
        ),
        'generate-customer' => 
        array (
          'options' => 
          array (
            'route' => 'generate customer [<brand>] (full|incr):generate [<changeset_id>]',
            'defaults' => 
            array (
              'controller' => 'LundProducts\\Controller\\Generate',
              'action' => 'generatecustomer',
            ),
          ),
        ),
        'generate-aces' => 
        array (
          'options' => 
          array (
            'route' => 'generate aces <version> [<brand>] (full|incr):generate [<changeset_id>]',
            'defaults' => 
            array (
              'controller' => 'LundFeeds\\Controller\\Aces',
              'action' => 'generateaces',
            ),
          ),
        ),
        'generate-pies' => 
        array (
          'options' => 
          array (
            'route' => 'generate pies <version> [<brand>] (full|incr):generate [<changeset_id>]',
            'defaults' => 
            array (
              'controller' => 'LundFeeds\\Controller\\Pies',
              'action' => 'generatepies',
            ),
          ),
        ),
        'parse-customer' => 
        array (
          'options' => 
          array (
            'route' => 'parse customer <filename>',
            'defaults' => 
            array (
              'controller' => 'LundCustomer\\Controller\\Parse',
              'action' => 'parsecustomer',
            ),
          ),
        ),
        'monitor-customer' => 
        array (
          'options' => 
          array (
            'route' => 'monitor customer <dirname>',
            'defaults' => 
            array (
              'controller' => 'LundCustomer\\Controller\\Monitor',
              'action' => 'monitorcustomer',
            ),
          ),
        ),
        'transmit-customer' => 
        array (
          'options' => 
          array (
            'route' => 'transmit customer <frequency>',
            'defaults' => 
            array (
              'controller' => 'LundCustomer\\Controller\\Transmit',
              'action' => 'transmitcustomer',
            ),
          ),
        ),
      ),
    ),
  ),
  'form_elements' => 
  array (
    'aliases' => 
    array (
      'objectselect' => 'DoctrineModule\\Form\\Element\\ObjectSelect',
      'objectradio' => 'DoctrineModule\\Form\\Element\\ObjectRadio',
      'objectmulticheckbox' => 'DoctrineModule\\Form\\Element\\ObjectMultiCheckbox',
    ),
    'factories' => 
    array (
      'DoctrineModule\\Form\\Element\\ObjectSelect' => 'DoctrineORMModule\\Service\\ObjectSelectFactory',
      'DoctrineModule\\Form\\Element\\ObjectRadio' => 'DoctrineORMModule\\Service\\ObjectRadioFactory',
      'DoctrineModule\\Form\\Element\\ObjectMultiCheckbox' => 'DoctrineORMModule\\Service\\ObjectMultiCheckboxFactory',
    ),
  ),
  'hydrators' => 
  array (
    'factories' => 
    array (
      'DoctrineModule\\Stdlib\\Hydrator\\DoctrineObject' => 'DoctrineORMModule\\Service\\DoctrineObjectHydratorFactory',
    ),
  ),
  'router' => 
  array (
    'routes' => 
    array (
      'doctrine_orm_module_yuml' => 
      array (
        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/ocra_service_manager_yuml',
          'defaults' => 
          array (
            'controller' => 'DoctrineORMModule\\Yuml\\YumlController',
            'action' => 'index',
          ),
        ),
      ),
      'home' => 
      array (
        'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
        'priority' => 100,
        'options' => 
        array (
          'route' => '/[:slugone][/:slugtwo][/:slugthree][/:slugfour][/:slugfive]',
          'constraints' => 
          array (
            'slugone' => '(?!admin)[a-zA-Z][a-zA-Z0-9_-]*',
            'slugtwo' => '[a-zA-Z0-9][a-zA-Z0-9&%+_-]*',
            'slugthree' => '[a-zA-Z0-9][a-zA-Z0-9&%+_-]*',
            'slugfour' => '[a-zA-Z0-9][a-zA-Z0-9&%+_-]*',
            'slugfive' => '[a-zA-Z0-9][a-zA-Z0-9&%+_-]*',
          ),
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\Index',
            'action' => 'index',
            'slugone' => 'index',
            'slugtwo' => false,
            'slugthree' => false,
            'slugfour' => false,
            'slugfive' => false,
          ),
        ),
      ),
      'rocket-admin' => 
      array (
        'child_routes' => 
        array (
          'order-system' => 
          array (
            'child_routes' => 
            array (
              'order' => 
              array (
                'child_routes' => 
                array (
                  'view' => 
                  array (
                    'child_routes' => 
                    array (
                      'order-item' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/order-item',
                          'defaults' => 
                          array (
                            'controller' => 'LundProducts\\Controller\\OrderItem',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\OrderItem',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:orderitemid',
                              'constraints' => 
                              array (
                                'orderitemid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\OrderItem',
                                'action' => 'edit',
                                'orderitemid' => 0,
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:orderitemid',
                              'constraints' => 
                              array (
                                'orderitemid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\OrderItem',
                                'action' => 'delete',
                                'orderitemid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                      'order-address' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/order-address',
                          'defaults' => 
                          array (
                            'controller' => 'RocketAdmin\\Controller\\OrderAddress',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\OrderAddress',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:orderaddressid',
                              'constraints' => 
                              array (
                                'orderaddressid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\OrderAddress',
                                'action' => 'edit',
                                'orderaddressid' => 0,
                              ),
                            ),
                          ),
                          'view' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/view/:orderaddressid',
                              'constraints' => 
                              array (
                                'orderaddressid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\OrderAddress',
                                'action' => 'view',
                                'orderaddressid' => 0,
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:orderaddressid',
                              'constraints' => 
                              array (
                                'orderaddressid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\OrderAddress',
                                'action' => 'delete',
                                'orderaddressid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                    ),
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Order',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                  ),
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Order',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Order',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/order',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Order',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
              ),
              'shipping-method' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/shipping-method',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\ShippingMethod',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\ShippingMethod',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\ShippingMethod',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\ShippingMethod',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\ShippingMethod',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
            ),
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/order-system',
              'defaults' => 
              array (
                'controller' => 'RocketAdmin\\Controller\\Order',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
          ),
          'imagine' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
            'options' => 
            array (
              'route' => '/imagine/:hash/:width/:height',
              'constraints' => 
              array (
                'hash' => '[a-zA-Z0-9\\-_|]*',
                'width' => '[0-9]*',
                'height' => '[0-9]*',
              ),
              'defaults' => 
              array (
                'controller' => 'LundProducts\\Controller\\Imagine',
                'action' => 'index',
                'hash' => 0,
                'width' => 0,
                'height' => 0,
              ),
            ),
          ),
          'products' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/products',
              'defaults' => 
              array (
                'controller' => 'LundProducts\\Controller\\Changesets',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_routes' => 
            array (
              'brands' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/brands',
                  'defaults' => 
                  array (
                    'controller' => 'LundProducts\\Controller\\Brands',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Brands',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Brands',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Brands',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Brands',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                    'child_routes' => 
                    array (
                      'product-category' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/productcategory',
                          'defaults' => 
                          array (
                            'controller' => 'LundProducts\\Controller\\BrandProductCategory',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\BrandProductCategory',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:brandproductcategoryid',
                              'constraints' => 
                              array (
                                'brandproductcategoryid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\BrandProductCategory',
                                'action' => 'edit',
                                'brandproductcategoryid' => 0,
                              ),
                            ),
                          ),
                          'view' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/view/:brandproductcategoryid',
                              'constraints' => 
                              array (
                                'brandproductcategoryid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\BrandProductCategory',
                                'action' => 'view',
                                'brandproductcategoryid' => 0,
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:brandproductcategoryid',
                              'constraints' => 
                              array (
                                'brandproductcategoryid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\BrandProductCategory',
                                'action' => 'delete',
                                'brandproductcategoryid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                ),
              ),
              'product-categories' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/productcategories',
                  'defaults' => 
                  array (
                    'controller' => 'LundProducts\\Controller\\ProductCategories',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductCategories',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductCategories',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductCategories',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductCategories',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'product-lines' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/productlines',
                  'defaults' => 
                  array (
                    'controller' => 'LundProducts\\Controller\\ProductLines',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductLines',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductLines',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductLines',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductLines',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                    'child_routes' => 
                    array (
                      'asset' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/asset',
                          'defaults' => 
                          array (
                            'controller' => 'LundProducts\\Controller\\ProductLineAsset',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\ProductLineAsset',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:productlineassetid',
                              'constraints' => 
                              array (
                                'productlineassetid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\ProductLineAsset',
                                'action' => 'edit',
                                'productlineassetid' => 0,
                              ),
                            ),
                          ),
                          'view' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/view/:productlineassetid',
                              'constraints' => 
                              array (
                                'productlineassetid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\ProductLineAsset',
                                'action' => 'view',
                                'productlineassetid' => 0,
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:productlineassetid',
                              'constraints' => 
                              array (
                                'productlineassetid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\ProductLineAsset',
                                'action' => 'delete',
                                'productlineassetid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                      'feature' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/feature',
                          'defaults' => 
                          array (
                            'controller' => 'LundProducts\\Controller\\ProductLineFeature',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\ProductLineFeature',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:productlinefeatureid',
                              'constraints' => 
                              array (
                                'productlinefeatureid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\ProductLineFeature',
                                'action' => 'edit',
                                'productlinefeatureid' => 0,
                              ),
                            ),
                          ),
                          'view' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/view/:productlinefeatureid',
                              'constraints' => 
                              array (
                                'productlinefeatureid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\ProductLineFeature',
                                'action' => 'view',
                                'productlinefeatureid' => 0,
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:productlinefeatureid',
                              'constraints' => 
                              array (
                                'productlinefeatureid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\ProductLineFeature',
                                'action' => 'delete',
                                'productlinefeatureid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                      'parts' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/parts',
                          'defaults' => 
                          array (
                            'controller' => 'LundProducts\\Controller\\ProductLines',
                            'action' => 'parts',
                          ),
                        ),
                        'may_terminate' => true,
                      ),
                    ),
                  ),
                ),
              ),
              'file-log' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/filelog',
                  'defaults' => 
                  array (
                    'controller' => 'LundProducts\\Controller\\FileLog',
                    'action' => 'index',
                  ),
                ),
              ),
              'changesets' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/changesets',
                  'defaults' => 
                  array (
                    'controller' => 'LundProducts\\Controller\\Changesets',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Changesets',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                    'child_routes' => 
                    array (
                      'viewvehicles' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                        'options' => 
                        array (
                          'route' => '/viewvehicles/:changesetdetailid',
                          'constraints' => 
                          array (
                            'changesetdetailid' => '[0-9]*',
                          ),
                          'defaults' => 
                          array (
                            'controller' => 'LundProducts\\Controller\\Changesets',
                            'action' => 'viewvehicles',
                            'changesetdetailid' => 0,
                          ),
                        ),
                      ),
                    ),
                  ),
                  'approve' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/approve/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Changesets',
                        'action' => 'approve',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                  ),
                  'deploy' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/deploy/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Changesets',
                        'action' => 'deploy',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                  ),
                  'deny' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/deny/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Changesets',
                        'action' => 'deny',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                  ),
                ),
              ),
              'parts' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/parts',
                  'defaults' => 
                  array (
                    'controller' => 'LundProducts\\Controller\\Parts',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'upload' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/upload',
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Parts',
                        'action' => 'upload',
                      ),
                    ),
                  ),
                  'process' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/process',
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Parts',
                        'action' => 'process',
                      ),
                    ),
                  ),
                  'disable' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/disable/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Parts',
                        'action' => 'disable',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Parts',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                    'child_routes' => 
                    array (
                      'asset' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/asset',
                          'defaults' => 
                          array (
                            'controller' => 'LundProducts\\Controller\\PartAsset',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\PartAsset',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:partassetid',
                              'constraints' => 
                              array (
                                'partassetid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\PartAsset',
                                'action' => 'edit',
                                'partassetid' => 0,
                              ),
                            ),
                          ),
                          'view' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/view/:partassetid',
                              'constraints' => 
                              array (
                                'partassetid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\PartAsset',
                                'action' => 'view',
                                'partassetid' => 0,
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:partassetid',
                              'constraints' => 
                              array (
                                'partassetid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'LundProducts\\Controller\\PartAsset',
                                'action' => 'delete',
                                'partassetid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                  'vehicles' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/vehicles/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controlers' => 'LundProducts\\Controller\\Parts',
                        'action' => 'vehicles',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'vehicles' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/vehicles',
                  'defaults' => 
                  array (
                    'controller' => 'LundProducts\\Controller\\Vehicles',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'parts' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/parts/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\Vehicles',
                        'action' => 'parts',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'product-reviews' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/productreviews',
                  'defaults' => 
                  array (
                    'controller' => 'LundProducts\\Controller\\ProductReviews',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductReviews',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductReviews',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductReviews',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'approve' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/approve/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundProducts\\Controller\\ProductReviews',
                        'action' => 'approve',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'accounts' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/accounts',
              'defaults' => 
              array (
                'controller' => 'LundCustomer\\Controller\\Customer',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_routes' => 
            array (
              'customer' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/customer',
                  'defaults' => 
                  array (
                    'controller' => 'LundCustomer\\Controller\\Customer',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Customer',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Customer',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Customer',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Customer',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                    'child_routes' => 
                    array (
                      'transmission' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/transmission',
                          'defaults' => 
                          array (
                            'controller' => 'LundCustomer\\Controller\\Transmit',
                            'action' => 'customer',
                          ),
                        ),
                      ),
                    ),
                  ),
                  'transmit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/transmit',
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Transmit',
                        'action' => 'index',
                      ),
                    ),
                  ),
                ),
              ),
              'retailer' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/retailer',
                  'defaults' => 
                  array (
                    'controller' => 'LundCustomer\\Controller\\Retailer',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Retailer',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Retailer',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Retailer',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundCustomer\\Controller\\Retailer',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'lund' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/lund',
              'defaults' => 
              array (
                'controller' => 'LundSite\\Controller\\NewsRelease',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_routes' => 
            array (
              'news-release' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/news-release',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\NewsRelease',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\NewsRelease',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\NewsRelease',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\NewsRelease',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\NewsRelease',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'showroom' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/showroom',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\Showroom',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Showroom',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Showroom',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Showroom',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Showroom',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'slider' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/slider',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\Slider',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Slider',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Slider',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Slider',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Slider',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'rank-up' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/rank-up/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Slider',
                        'action' => 'rankUp',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'rank-down' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/rank-down/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Slider',
                        'action' => 'rankDown',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'testimonial' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/testimonial',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\Testimonial',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Testimonial',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Testimonial',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Testimonial',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Testimonial',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'rank-up' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/rank-up/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Testimonial',
                        'action' => 'rankUp',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'rank-down' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/rank-down/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\Testimonial',
                        'action' => 'rankDown',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'contact-submission' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/contact-submission',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\ContactSubmission',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\ContactSubmission',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\ContactSubmission',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\ContactSubmission',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\ContactSubmission',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'support-request' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/support-request',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\SupportRequest',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\SupportRequest',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\SupportRequest',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\SupportRequest',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\SupportRequest',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'product-registration' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/product-registration',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\ProductRegistration',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\ProductRegistration',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\ProductRegistration',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\ProductRegistration',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\ProductRegistration',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'dealers-edge' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/dealers-edge',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\DealersEdge',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\DealersEdge',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\DealersEdge',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\DealersEdge',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\DealersEdge',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'drivers-council' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/drivers-council',
                  'defaults' => 
                  array (
                    'controller' => 'LundSite\\Controller\\DriversCouncil',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\DriversCouncil',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\DriversCouncil',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\DriversCouncil',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'LundSite\\Controller\\DriversCouncil',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'message' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/message',
              'defaults' => 
              array (
                'controller' => 'RocketAdmin\\Controller\\Message',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_routes' => 
            array (
              'read' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                'options' => 
                array (
                  'route' => '/read/:id',
                  'constraints' => 
                  array (
                    'id' => '[0-9]*',
                  ),
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Message',
                    'action' => 'read',
                    'id' => 0,
                  ),
                ),
              ),
              'create' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/create',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Message',
                    'action' => 'create',
                  ),
                ),
              ),
              'view' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                'options' => 
                array (
                  'route' => '/view/:id',
                  'constraints' => 
                  array (
                    'id' => '[0-9]*',
                  ),
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Message',
                    'action' => 'view',
                    'id' => 0,
                  ),
                ),
              ),
              'delete' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                'options' => 
                array (
                  'route' => '/delete/:id',
                  'constraints' => 
                  array (
                    'id' => '[0-9]*',
                  ),
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Message',
                    'action' => 'delete',
                    'id' => 0,
                  ),
                ),
              ),
            ),
          ),
          'task' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/task',
              'defaults' => 
              array (
                'controller' => 'RocketAdmin\\Controller\\Task',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_routes' => 
            array (
              'complete' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                'options' => 
                array (
                  'route' => '/complete/:id',
                  'constraints' => 
                  array (
                    'id' => '[0-9]*',
                  ),
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Task',
                    'action' => 'complete',
                    'id' => 0,
                  ),
                ),
              ),
              'create' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/create',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Task',
                    'action' => 'create',
                  ),
                ),
              ),
              'edit' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                'options' => 
                array (
                  'route' => '/edit/:id',
                  'constraints' => 
                  array (
                    'id' => '[0-9]*',
                  ),
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Task',
                    'action' => 'edit',
                    'id' => 0,
                  ),
                ),
              ),
              'view' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                'options' => 
                array (
                  'route' => '/view/:id',
                  'constraints' => 
                  array (
                    'id' => '[0-9]*',
                  ),
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Task',
                    'action' => 'view',
                    'id' => 0,
                  ),
                ),
              ),
              'delete' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                'options' => 
                array (
                  'route' => '/delete/:id',
                  'constraints' => 
                  array (
                    'id' => '[0-9]*',
                  ),
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Task',
                    'action' => 'delete',
                    'id' => 0,
                  ),
                ),
              ),
            ),
          ),
          'asset' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/dam',
              'defaults' => 
              array (
                'controller' => 'RocketAdmin\\Controller\\Asset',
                'actions' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_routes' => 
            array (
              'asset' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/asset',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Connector',
                    'action' => 'index',
                  ),
                ),
              ),
              'connector' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/connector',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Connector',
                    'action' => 'index',
                  ),
                ),
              ),
            ),
          ),
          'cms' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/cms',
              'defaults' => 
              array (
                'controller' => 'RocketAdmin\\Controller\\Site',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_routes' => 
            array (
              'site' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/site',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Site',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Site',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Site',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Site',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                    'may_terminate' => true,
                    'child_routes' => 
                    array (
                      'layout' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/layout',
                          'defaults' => 
                          array (
                            'controller' => 'RocketAdmin\\Controller\\Layout',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Layout',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:layoutid',
                              'constraints' => 
                              array (
                                'layoutid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Layout',
                                'action' => 'edit',
                                'layoutid' => 0,
                              ),
                            ),
                          ),
                          'view' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/view/:layoutid',
                              'constraints' => 
                              array (
                                'layoutid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Layout',
                                'action' => 'view',
                                'layoutid' => 0,
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:layoutid',
                              'constraints' => 
                              array (
                                'layoutid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Layout',
                                'action' => 'delete',
                                'layoutid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                      'page' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/page',
                          'defaults' => 
                          array (
                            'controller' => 'RocketAdmin\\Controller\\Page',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Page',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:pageid',
                              'constraints' => 
                              array (
                                'pageid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Page',
                                'action' => 'edit',
                                'pageid' => 0,
                              ),
                            ),
                          ),
                          'view' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/view/:pageid',
                              'constraints' => 
                              array (
                                'pageid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Page',
                                'action' => 'view',
                                'pageid' => 0,
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:pageid',
                              'constraints' => 
                              array (
                                'pageid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Page',
                                'action' => 'delete',
                                'pageid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                      'menu' => 
                      array (
                        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                        'options' => 
                        array (
                          'route' => '/menu',
                          'defaults' => 
                          array (
                            'controller' => 'RocketAdmin\\Controller\\Menu',
                            'action' => 'index',
                          ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => 
                        array (
                          'create' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                            'options' => 
                            array (
                              'route' => '/create',
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Menu',
                                'action' => 'create',
                              ),
                            ),
                          ),
                          'edit' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/edit/:menuid',
                              'constraints' => 
                              array (
                                'menuid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Menu',
                                'action' => 'edit',
                                'menuid' => 0,
                              ),
                            ),
                          ),
                          'view' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/view/:menuid',
                              'constraints' => 
                              array (
                                'menuid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Menu',
                                'action' => 'view',
                                'menuid' => 0,
                              ),
                            ),
                            'may_terminate' => true,
                            'child_routes' => 
                            array (
                              'element' => 
                              array (
                                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                                'options' => 
                                array (
                                  'route' => '/element',
                                  'defaults' => 
                                  array (
                                    'controller' => 'RocketAdmin\\Controller\\MenuElement',
                                    'action' => 'index',
                                  ),
                                ),
                                'may_terminate' => true,
                                'child_routes' => 
                                array (
                                  'create' => 
                                  array (
                                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                                    'options' => 
                                    array (
                                      'route' => '/create',
                                      'defaults' => 
                                      array (
                                        'controller' => 'RocketAdmin\\Controller\\MenuElement',
                                        'action' => 'create',
                                      ),
                                    ),
                                  ),
                                  'edit' => 
                                  array (
                                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                                    'options' => 
                                    array (
                                      'route' => '/edit/:elementid',
                                      'constraints' => 
                                      array (
                                        'elementid' => '[0-9]*',
                                      ),
                                      'defaults' => 
                                      array (
                                        'controller' => 'RocketAdmin\\Controller\\MenuElement',
                                        'action' => 'edit',
                                        'elementid' => 0,
                                      ),
                                    ),
                                  ),
                                  'view' => 
                                  array (
                                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                                    'options' => 
                                    array (
                                      'route' => '/view/:elementid',
                                      'constraints' => 
                                      array (
                                        'elementid' => '[0-9]*',
                                      ),
                                      'defaults' => 
                                      array (
                                        'controller' => 'RocketAdmin\\Controller\\MenuElement',
                                        'action' => 'view',
                                        'elementid' => 0,
                                      ),
                                    ),
                                  ),
                                  'delete' => 
                                  array (
                                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                                    'options' => 
                                    array (
                                      'route' => '/delete/:elementid',
                                      'constraints' => 
                                      array (
                                        'elementid' => '[0-9]*',
                                      ),
                                      'defaults' => 
                                      array (
                                        'controller' => 'RocketAdmin\\Controller\\MenuElement',
                                        'action' => 'delete',
                                        'elementid' => 0,
                                      ),
                                    ),
                                  ),
                                ),
                              ),
                            ),
                          ),
                          'delete' => 
                          array (
                            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                            'options' => 
                            array (
                              'route' => '/delete/:menuid',
                              'constraints' => 
                              array (
                                'menuid' => '[0-9]*',
                              ),
                              'defaults' => 
                              array (
                                'controller' => 'RocketAdmin\\Controller\\Menu',
                                'action' => 'delete',
                                'menuid' => 0,
                              ),
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Site',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
              'template' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/template',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Template',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Template',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Template',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Template',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\Template',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'settings' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/settings',
              'defaults' => 
              array (
                'controller' => 'RocketAdmin\\Controller\\User',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_routes' => 
            array (
              'user' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/user',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\User',
                    'action' => 'index',
                  ),
                ),
                'may_terminate' => true,
                'child_routes' => 
                array (
                  'create' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/create',
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\User',
                        'action' => 'create',
                      ),
                    ),
                  ),
                  'edit' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/edit/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\User',
                        'action' => 'edit',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'delete' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/delete/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\User',
                        'action' => 'delete',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'view' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                    'options' => 
                    array (
                      'route' => '/view/:id',
                      'constraints' => 
                      array (
                        'id' => '[0-9]*',
                      ),
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\User',
                        'action' => 'view',
                        'id' => 0,
                      ),
                    ),
                  ),
                  'profile' => 
                  array (
                    'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                    'options' => 
                    array (
                      'route' => '/profile',
                      'defaults' => 
                      array (
                        'controller' => 'RocketAdmin\\Controller\\User',
                        'action' => 'profile',
                      ),
                    ),
                  ),
                ),
              ),
              'audit' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/audit',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Audit',
                    'action' => 'index',
                  ),
                ),
              ),
            ),
          ),
          'login' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/login',
              'defaults' => 
              array (
                'controller' => 'RocketAdmin\\Controller\\Login',
                'action' => 'index',
              ),
            ),
            'may_terminate' => true,
            'child_route' => 
            array (
              'username' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/username',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Login',
                    'action' => 'username',
                  ),
                ),
              ),
              'password' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
                'options' => 
                array (
                  'route' => '/password',
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Login',
                    'action' => 'password',
                  ),
                ),
              ),
              'reset' => 
              array (
                'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
                'options' => 
                array (
                  'route' => '/reset/[:id][/]',
                  'constraints' => 
                  array (
                    'id' => '[0-9]+',
                  ),
                  'defaults' => 
                  array (
                    'controller' => 'RocketAdmin\\Controller\\Login',
                    'action' => 'reset',
                  ),
                ),
              ),
            ),
          ),
          'logout' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/logout',
              'defaults' => 
              array (
                'controller' => 'RocketAdmin\\Controller\\Login',
                'action' => 'logout',
              ),
            ),
          ),
        ),
        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/admin',
          'defaults' => 
          array (
            'controller' => 'RocketAdmin\\Controller\\Index',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
      ),
    ),
  ),
  'view_manager' => 
  array (
    'template_map' => 
    array (
      'zend-developer-tools/toolbar/doctrine-orm-queries' => '/var/www/SmartDataAdmin/vendor/doctrine/doctrine-orm-module/config/../view/zend-developer-tools/toolbar/doctrine-orm-queries.phtml',
      'zend-developer-tools/toolbar/doctrine-orm-mappings' => '/var/www/SmartDataAdmin/vendor/doctrine/doctrine-orm-module/config/../view/zend-developer-tools/toolbar/doctrine-orm-mappings.phtml',
      'application/layout' => '/var/www/SmartDataAdmin/module/Application/config/../view/layout/application-layout.phtml',
      'layout/layout' => '/var/www/SmartDataAdmin/module/Application/config/../view/layout/application-layout.phtml',
      'application-error/404' => '/var/www/SmartDataAdmin/module/Application/config/../view/application/error/application-404.phtml',
      'application-error/403' => '/var/www/SmartDataAdmin/module/Application/config/../view/application/error/application-403.phtml',
      'application-error/index' => '/var/www/SmartDataAdmin/module/Application/config/../view/application/error/application-index.phtml',
      0 => 
      array (
        'lund-products/product-lines/parts' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-lines/parts.phtml',
        'lund-products/product-lines/view' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-lines/view.phtml',
        'lund-products/product-lines/create' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-lines/create.phtml',
        'lund-products/product-lines/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-lines/index.phtml',
        'lund-products/product-lines/edit' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-lines/edit.phtml',
        'lund-products/changesets/view' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/changesets/view.phtml',
        'lund-products/changesets/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/changesets/index.phtml',
        'lund-products/changesets/viewvehicles' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/changesets/viewvehicles.phtml',
        'lund-products/product-line-asset/view' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-line-asset/view.phtml',
        'lund-products/product-line-asset/create' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-line-asset/create.phtml',
        'lund-products/product-line-asset/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-line-asset/index.phtml',
        'lund-products/product-line-asset/edit' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-line-asset/edit.phtml',
        'lund-products/order-item/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/order-item/index.phtml',
        'lund-products/file-log/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/file-log/index.phtml',
        'lund-products/part-asset/view' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/part-asset/view.phtml',
        'lund-products/part-asset/create' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/part-asset/create.phtml',
        'lund-products/part-asset/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/part-asset/index.phtml',
        'lund-products/part-asset/edit' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/part-asset/edit.phtml',
        'lund-products/brand-product-category/view' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/brand-product-category/view.phtml',
        'lund-products/brand-product-category/create' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/brand-product-category/create.phtml',
        'lund-products/brand-product-category/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/brand-product-category/index.phtml',
        'lund-products/brand-product-category/edit' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/brand-product-category/edit.phtml',
        'lund-products/vehicles/parts' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/vehicles/parts.phtml',
        'lund-products/vehicles/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/vehicles/index.phtml',
        'lund-products/brands/view' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/brands/view.phtml',
        'lund-products/brands/create' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/brands/create.phtml',
        'lund-products/brands/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/brands/index.phtml',
        'lund-products/brands/edit' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/brands/edit.phtml',
        'lund-products/product-categories/view' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-categories/view.phtml',
        'lund-products/product-categories/create' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-categories/create.phtml',
        'lund-products/product-categories/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-categories/index.phtml',
        'lund-products/product-categories/edit' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-categories/edit.phtml',
        'lund-products/product-reviews/create' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-reviews/create.phtml',
        'lund-products/product-reviews/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-reviews/index.phtml',
        'lund-products/product-reviews/edit' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/product-reviews/edit.phtml',
        'lund-products/parts/view' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/parts/view.phtml',
        'lund-products/parts/vehicles' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/parts/vehicles.phtml',
        'lund-products/parts/index' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/parts/index.phtml',
        'lund-products/parts/upload' => '/var/www/SmartDataAdmin/module/LundProducts/view/lund-products/parts/upload.phtml',
      ),
      1 => 
      array (
        '.gitignore' => '/var/www/SmartDataAdmin/module/LundFeeds/view/.gitignore',
      ),
      2 => 
      array (
        'lund-customer/retailer/view' => '/var/www/SmartDataAdmin/module/LundCustomer/view/lund-customer/retailer/view.phtml',
        'lund-customer/retailer/create' => '/var/www/SmartDataAdmin/module/LundCustomer/view/lund-customer/retailer/create.phtml',
        'lund-customer/retailer/index' => '/var/www/SmartDataAdmin/module/LundCustomer/view/lund-customer/retailer/index.phtml',
        'lund-customer/retailer/edit' => '/var/www/SmartDataAdmin/module/LundCustomer/view/lund-customer/retailer/edit.phtml',
        'lund-customer/customer/view' => '/var/www/SmartDataAdmin/module/LundCustomer/view/lund-customer/customer/view.phtml',
        'lund-customer/customer/create' => '/var/www/SmartDataAdmin/module/LundCustomer/view/lund-customer/customer/create.phtml',
        'lund-customer/customer/index' => '/var/www/SmartDataAdmin/module/LundCustomer/view/lund-customer/customer/index.phtml',
        'lund-customer/customer/edit' => '/var/www/SmartDataAdmin/module/LundCustomer/view/lund-customer/customer/edit.phtml',
      ),
      3 => 
      array (
        'lund-site/testimonial/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/testimonial/view.phtml',
        'lund-site/testimonial/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/testimonial/create.phtml',
        'lund-site/testimonial/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/testimonial/index.phtml',
        'lund-site/testimonial/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/testimonial/edit.phtml',
        'lund-site/news-release/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/news-release/view.phtml',
        'lund-site/news-release/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/news-release/create.phtml',
        'lund-site/news-release/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/news-release/index.phtml',
        'lund-site/news-release/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/news-release/edit.phtml',
        'lund-site/contact-submission/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/contact-submission/view.phtml',
        'lund-site/contact-submission/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/contact-submission/create.phtml',
        'lund-site/contact-submission/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/contact-submission/index.phtml',
        'lund-site/contact-submission/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/contact-submission/edit.phtml',
        'lund-site/showroom/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/showroom/view.phtml',
        'lund-site/showroom/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/showroom/create.phtml',
        'lund-site/showroom/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/showroom/index.phtml',
        'lund-site/showroom/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/showroom/edit.phtml',
        'lund-site/product-registration/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/product-registration/view.phtml',
        'lund-site/product-registration/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/product-registration/create.phtml',
        'lund-site/product-registration/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/product-registration/index.phtml',
        'lund-site/product-registration/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/product-registration/edit.phtml',
        'lund-site/drivers-council/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/drivers-council/view.phtml',
        'lund-site/drivers-council/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/drivers-council/create.phtml',
        'lund-site/drivers-council/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/drivers-council/index.phtml',
        'lund-site/drivers-council/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/drivers-council/edit.phtml',
        'lund-site/slider/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/slider/view.phtml',
        'lund-site/slider/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/slider/create.phtml',
        'lund-site/slider/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/slider/index.phtml',
        'lund-site/slider/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/slider/edit.phtml',
        'lund-site/support-request/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/support-request/view.phtml',
        'lund-site/support-request/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/support-request/create.phtml',
        'lund-site/support-request/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/support-request/index.phtml',
        'lund-site/support-request/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/support-request/edit.phtml',
        'lund-site/dealers-edge/view' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/dealers-edge/view.phtml',
        'lund-site/dealers-edge/create' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/dealers-edge/create.phtml',
        'lund-site/dealers-edge/index' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/dealers-edge/index.phtml',
        'lund-site/dealers-edge/edit' => '/var/www/sites/pims.lundinternational.com/module/LundSite/view/lund-site/dealers-edge/edit.phtml',
      ),
      'admin/layout' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view/layout/admin-layout.phtml',
      'admin/login' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view/layout/admin-login.phtml',
      'admin-error/404' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view/rocket-admin/error/admin-404.phtml',
      'admin-error/403' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view/rocket-admin/error/admin-403.phtml',
      'admin-error/index' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view/rocket-admin/error/admin-index.phtml',
      'admin/form-partial' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view/layout/admin-form-partial.phtml',
      'admin/form-readonly-partial' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view/layout/admin-form-readonly-partial.phtml',
      'admin/user-messages' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view/layout/admin-user-messages.phtml',
    ),
    'template_path_stack' => 
    array (
      0 => '/var/www/sites/pims.lundinternational.com/vendor/zf-commons/zfc-rbac/config/../view',
      'application' => '/var/www/sites/pims.lundinternational.com/module/Application/config/../view',
      'lund-products' => '/var/www/sites/pims.lundinternational.com/module/LundProducts/config/../view',
      'lund-feeds' => '/var/www/sites/pims.lundinternational.com/module/LundFeeds/config/../view',
      'lund-customer' => '/var/www/sites/pims.lundinternational.com/module/LundCustomer/config/../view',
      'lund-site' => '/var/www/sites/pims.lundinternational.com/module/LundSite/config/../view',
      'rocket-admin' => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../view',
    ),
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'default_template_suffix' => 'phtml',
    'not_found_template' => 'admin-error/404',
    'exception_template' => 'admin-error/index',
    'strategies' => 
    array (
      0 => 'ViewJsonStrategy',
      1 => 'ViewJsonStrategy',
      2 => 'ViewJsonStrategy',
      3 => 'ViewJsonStrategy',
      4 => 'ViewJsonStrategy',
      5 => 'ViewJsonStrategy',
    ),
  ),
  'zenddevelopertools' => 
  array (
    'profiler' => 
    array (
      'collectors' => 
      array (
        'doctrine.sql_logger_collector.orm_default' => 'doctrine.sql_logger_collector.orm_default',
        'doctrine.mapping_collector.orm_default' => 'doctrine.mapping_collector.orm_default',
        'zfcrbac' => 'ZfcRbac\\Collector\\RbacCollector',
      ),
      'enabled' => true,
      'strict' => false,
      'flush_early' => false,
      'cache_dir' => 'data/cache',
      'matcher' => 
      array (
      ),
    ),
    'toolbar' => 
    array (
      'entries' => 
      array (
        'doctrine.sql_logger_collector.orm_default' => 'zend-developer-tools/toolbar/doctrine-orm-queries',
        'doctrine.mapping_collector.orm_default' => 'zend-developer-tools/toolbar/doctrine-orm-mappings',
        'zfcrbac' => 'zend-developer-tools/toolbar/zfcrbac',
      ),
      'enabled' => true,
      'auto_hide' => false,
      'position' => 'bottom',
      'version_check' => true,
    ),
  ),
  'asset_manager' => 
  array (
    'resolvers' => 
    array (
      'AssetManager\\Resolver\\MapResolver' => 3000,
      'AssetManager\\Resolver\\ConcatResolver' => 2500,
      'AssetManager\\Resolver\\CollectionResolver' => 2000,
      'AssetManager\\Resolver\\PrioritizedPathsResolver' => 1500,
      'AssetManager\\Resolver\\AliasPathStackResolver' => 1000,
      'AssetManager\\Resolver\\PathStackResolver' => 500,
    ),
    'resolver_configs' => 
    array (
      'paths' => 
      array (
        0 => '/var/www/sites/pims.lundinternational.com/module/Application/config/../public',
        1 => '/var/www/sites/pims.lundinternational.com/vendor/Raven3419/RocketAdmin/config/../public',
      ),
    ),
    'caching' => 
    array (
      'default' => 
      array (
        'cache' => 'FilePath',
        'options' => 
        array (
          'dir' => 'public',
        ),
      ),
    ),
  ),
  'zfcrbac' => 
  array (
    'anonymousRole' => 'guest',
    'firewallRoute' => false,
    'firewallController' => true,
    'template' => 'admin-error/403',
    'firewalls' => 
    array (
      'ZfcRbac\\Firewall\\Controller' => 
      array (
        0 => 
        array (
          'controller' => 'Application\\Controller\\Index',
          'roles' => 'guest',
        ),
        1 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Index',
          'roles' => 'staff',
        ),
        2 => 
        array (
          'controller' => 'RokcetAdmin\\Controller\\Message',
          'roles' => 'staff',
        ),
        3 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\User',
          'roles' => 'administrator',
        ),
        4 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Task',
          'roles' => 'staff',
        ),
        5 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Audit',
          'roles' => 'staff',
        ),
        6 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Asset',
          'roles' => 'staff',
        ),
        7 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Audit',
          'roles' => 'administrator',
        ),
        8 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Connector',
          'roles' => 'guest',
        ),
        9 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Layout',
          'roles' => 'staff',
        ),
        10 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Login',
          'roles' => 'guest',
        ),
        11 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Menu',
          'roles' => 'staff',
        ),
        12 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\MenuElement',
          'roles' => 'staff',
        ),
        13 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Page',
          'roles' => 'staff',
        ),
        14 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Site',
          'roles' => 'staff',
        ),
        15 => 
        array (
          'controller' => 'RocketAdmin\\Controller\\Template',
          'roles' => 'staff',
        ),
        16 => 
        array (
          'controller' => 'LundCustomer\\Controller\\Customer',
          'roles' => 'staff',
        ),
        17 => 
        array (
          'controller' => 'LundCustomer\\Controller\\Parse',
          'roles' => 'guest',
        ),
        18 => 
        array (
          'controller' => 'LundCustomer\\Controller\\Monitor',
          'roles' => 'guest',
        ),
        19 => 
        array (
          'controller' => 'LundCustomer\\Controller\\Retailer',
          'roles' => 'staff',
        ),
        20 => 
        array (
          'controller' => 'LundCustomer\\Controller\\Transmit',
          'roles' => 'guest',
        ),
        21 => 
        array (
          'controller' => 'LundProducts\\Controller\\Brands',
          'roles' => 'staff',
        ),
        22 => 
        array (
          'controller' => 'LundProducts\\Controller\\Changesets',
          'roles' => 'staff',
        ),
        23 => 
        array (
          'controller' => 'LundProducts\\Controller\\Generate',
          'roles' => 'guest',
        ),
        24 => 
        array (
          'controller' => 'LundProducts\\Controller\\Imagine',
          'roles' => 'guest',
        ),
        25 => 
        array (
          'controller' => 'LundProducts\\Controller\\Monitor',
          'roles' => 'guest',
        ),
        26 => 
        array (
          'controller' => 'LundProducts\\Controller\\Parse',
          'roles' => 'guest',
        ),
        27 => 
        array (
          'controller' => 'LundProducts\\Controller\\Parts',
          'roles' => 'staff',
        ),
        28 => 
        array (
          'controller' => 'LundProducts\\Controller\\ProductCategories',
          'roles' => 'staff',
        ),
        29 => 
        array (
          'controller' => 'LundProducts\\Controller\\ProductLines',
          'roles' => 'staff',
        ),
        30 => 
        array (
          'controller' => 'LundProducts\\Controller\\ProductReviews',
          'roles' => 'staff',
        ),
        31 => 
        array (
          'controller' => 'LundProducts\\Controller\\Vehicles',
          'roles' => 'staff',
        ),
        32 => 
        array (
          'controller' => 'LundFeeds\\Controller\\Aces',
          'roles' => 'guest',
        ),
        33 => 
        array (
          'controller' => 'LundFeeds\\Controller\\Pies',
          'roles' => 'guest',
        ),
        34 => 
        array (
          'controller' => 'LundSite\\Controller\\NewsRelease',
          'roles' => 'staff',
        ),
        35 => 
        array (
          'controller' => 'LundSite\\Controller\\ContactSubmission',
          'roles' => 'staff',
        ),
        36 => 
        array (
          'controller' => 'LundSite\\Controller\\DealersEdge',
          'roles' => 'staff',
        ),
        37 => 
        array (
          'controller' => 'LundSite\\Controller\\DriversCouncil',
          'roles' => 'staff',
        ),
        38 => 
        array (
          'controller' => 'LundSite\\Controller\\ProductRegistration',
          'roles' => 'staff',
        ),
        39 => 
        array (
          'controller' => 'LundSite\\Controller\\SupportRequest',
          'roles' => 'staff',
        ),
        40 => 
        array (
          'controller' => 'LundSite\\Controller\\Showroom',
          'roles' => 'staff',
        ),
        41 => 
        array (
          'controller' => 'LundSite\\Controller\\Slider',
          'roles' => 'staff',
        ),
      ),
    ),
    'providers' => 
    array (
      'ZfcRbac\\Provider\\AdjacencyList\\Role\\DoctrineDbal' => 
      array (
        'connection' => 'doctrine.connection.orm_default',
        'options' => 
        array (
          'table' => 'rbac_role',
          'id_column' => 'role_id',
          'name_column' => 'role_name',
          'join_column' => 'parent_role_id',
        ),
      ),
      'ZfcRbac\\Provider\\Generic\\Permission\\DoctrineDbal' => 
      array (
        'connection' => 'doctrine.connection.orm_default',
        'options' => 
        array (
          'permission_table' => 'rbac_permission',
          'role_table' => 'rbac_role',
          'role_join_table' => 'rbac_role_permission',
          'permission_id_column' => 'perm_id',
          'permission_join_column' => 'perm_id',
          'permission_name_column' => 'perm_name',
          'role_id_column' => 'role_id',
          'role_join_column' => 'role_id',
          'role_name_column' => 'role_name',
        ),
      ),
    ),
    'identity_provider' => 'standard_identity',
  ),
  'ocra_cached_view_resolver' => 
  array (
    'cache' => 
    array (
      'adapter' => 
      array (
        'name' => 'memcached',
        'options' => 
        array (
          'ttl' => 84600,
          'namespace' => 'app_view_resolver_4d03f6f1a8e09c1c43e4ac3070d744c875bc6045',
          'servers' => 
          array (
            0 => 
            array (
              0 => 'localhost',
              1 => 11211,
            ),
          ),
        ),
      ),
    ),
    'cached_template_map_key' => 'cached_template_map',
  ),
  'module_layouts' => 
  array (
    'Application' => 'application/layout',
    'LundProducts' => 'admin/layout',
    'LundFeeds' => 'admin/layout',
    'LundCustomer' => 'admin/layout',
    'LundSite' => 'admin/layout',
    'RocketAdmin' => 'admin/layout',
  ),
  'navigation' => 
  array (
    'default' => 
    array (
    ),
    'admin' => 
    array (
      0 => 
      array (
        'label' => 'Products',
        'route' => 'rocket-admin/products',
        'permission' => 'LundProducts\\Controller\\Changesets:index',
        'icon' => 'icon-cogs',
        'order' => 200,
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Brands',
            'route' => 'rocket-admin/products/brands',
            'permission' => 'LundProducts\\Controller\\Brands:index',
            'order' => 201,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Brand',
                'route' => 'rocket-admin/products/brands/create',
                'permission' => 'LundProducts\\Controller\\Brands:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Brand',
                'route' => 'rocket-admin/products/brands/edit',
                'permission' => 'LundProducts\\Controller\\Brands:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Brand',
                'route' => 'rocket-admin/products/brands/view',
                'permission' => 'LundProducts\\Controller\\Brands:view',
                'use_route_match' => true,
                'pages' => 
                array (
                  0 => 
                  array (
                    'label' => 'View Brand Product Categories',
                    'route' => 'rocket-admin/products/brands/view/product-category',
                    'use_route_match' => true,
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Add Brand Product Category',
                        'route' => 'rocket-admin/products/brands/view/product-category/create',
                        'use_route_match' => true,
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Brand Product Category',
                        'route' => 'rocket-admin/products/brands/view/product-category/edit',
                        'use_route_match' => true,
                      ),
                      2 => 
                      array (
                        'label' => 'View Brand Product Category',
                        'route' => 'rocket-admin/products/brands/view/product-category/view',
                        'use_route_match' => true,
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          1 => 
          array (
            'label' => 'Product Categories',
            'route' => 'rocket-admin/products/product-categories',
            'order' => 202,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Product Category',
                'route' => 'rocket-admin/products/product-categories/create',
              ),
              1 => 
              array (
                'label' => 'Edit Product Category',
                'route' => 'rocket-admin/products/product-categories/edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Product Category',
                'route' => 'rocket-admin/products/product-categories/view',
                'use_route_match' => true,
              ),
            ),
          ),
          2 => 
          array (
            'label' => 'Product Lines',
            'route' => 'rocket-admin/products/product-lines',
            'order' => 203,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Product Line',
                'route' => 'rocket-admin/products/product-lines/create',
              ),
              1 => 
              array (
                'label' => 'Edit Product Line',
                'route' => 'rocket-admin/products/product-lines/edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Product Line',
                'route' => 'rocket-admin/products/product-lines/view',
                'use_route_match' => true,
                'pages' => 
                array (
                  0 => 
                  array (
                    'label' => 'View Product Line Assets',
                    'route' => 'rocket-admin/products/product-lines/view/asset',
                    'use_route_match' => true,
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Add Product Line Asset',
                        'route' => 'rocket-admin/products/product-lines/view/asset/create',
                        'use_route_match' => true,
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Product Line Asset',
                        'route' => 'rocket-admin/products/product-lines/view/asset/edit',
                        'use_route_match' => true,
                      ),
                      2 => 
                      array (
                        'label' => 'View Product Line Asset',
                        'route' => 'rocket-admin/products/product-lines/view/asset/view',
                        'use_route_match' => true,
                      ),
                    ),
                  ),
                  1 => 
                  array (
                    'label' => 'View Product Line Features',
                    'route' => 'rocket-admin/products/product-lines/view/feature',
                    'use_route_match' => true,
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Add Product Line Feature',
                        'route' => 'rocket-admin/products/product-lines/view/feature/create',
                        'use_route_match' => true,
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Product Line Feature',
                        'route' => 'rocket-admin/products/product-lines/view/feature/edit',
                        'use_route_match' => true,
                      ),
                      2 => 
                      array (
                        'label' => 'View Product Line Feature',
                        'route' => 'rocket-admin/products/product-lines/view/feature/view',
                        'use_route_match' => true,
                      ),
                    ),
                  ),
                  2 => 
                  array (
                    'label' => 'View Parts',
                    'route' => 'rocket-admin/products/product-lines/view/parts',
                    'use_route_match' => true,
                  ),
                ),
              ),
            ),
          ),
          3 => 
          array (
            'label' => 'Parts',
            'route' => 'rocket-admin/products/parts',
            'order' => 204,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Upload Part Assets',
                'route' => 'rocket-admin/products/parts/upload',
              ),
              1 => 
              array (
                'label' => 'Process Part Assets',
                'route' => 'rocket-admin/products/parts/process',
              ),
              2 => 
              array (
                'label' => 'View Part',
                'route' => 'rocket-admin/products/parts/view',
                'use_route_match' => true,
                'pages' => 
                array (
                  0 => 
                  array (
                    'label' => 'View Part Assets',
                    'route' => 'rocket-admin/products/parts/view/asset',
                    'use_route_match' => true,
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Add Part Asset',
                        'route' => 'rocket-admin/products/parts/view/asset/create',
                        'use_route_match' => true,
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Part Asset',
                        'route' => 'rocket-admin/products/parts/view/asset/edit',
                        'use_route_match' => true,
                      ),
                      2 => 
                      array (
                        'label' => 'View Part Asset',
                        'route' => 'rocket-admin/products/parts/view/asset/view',
                        'use_route_match' => true,
                      ),
                    ),
                  ),
                ),
              ),
              3 => 
              array (
                'label' => 'View Part Vehicles',
                'route' => 'rocket-admin/products/parts/vehicles',
                'use_route_match' => true,
              ),
            ),
          ),
          4 => 
          array (
            'label' => 'Vehicles',
            'route' => 'rocket-admin/products/vehicles',
            'order' => 205,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'View Vehicle Parts',
                'route' => 'rocket-admin/products/vehicles/parts',
                'use_route_match' => true,
              ),
            ),
          ),
          5 => 
          array (
            'label' => 'Product Reviews',
            'route' => 'rocket-admin/products/product-reviews',
            'order' => 206,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Review',
                'route' => 'rocket-admin/products/product-reviews/create',
              ),
              1 => 
              array (
                'label' => 'Edit Review',
                'route' => 'rocket-admin/products/product-reviews/edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'Approve Review',
                'route' => 'rocket-admin/products/product-reviews/approve',
                'use_route_match' => true,
              ),
            ),
          ),
          6 => 
          array (
            'label' => 'Changesets',
            'route' => 'rocket-admin/products/changesets',
            'permission' => 'LundProducts\\Controller\\Changesets:index',
            'order' => 207,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'View Changeset',
                'route' => 'rocket-admin/products/changesets/view',
                'use_route_match' => true,
                'permission' => 'LundProducts\\Controller\\Changesets:view',
                'pages' => 
                array (
                  0 => 
                  array (
                    'label' => 'View Changeset Vehicles',
                    'route' => 'rocket-admin/products/changesets/view/viewvehicles',
                    'use_route_match' => true,
                    'permission' => 'LundProducts\\Controller\\Changesets:viewvehicles',
                  ),
                ),
              ),
            ),
          ),
          7 => 
          array (
            'label' => 'File Logs',
            'route' => 'rocket-admin/products/file-log',
            'permission' => 'LundProducts\\Controller\\FileLog:index',
            'order' => 208,
          ),
        ),
      ),
      1 => 
      array (
        'label' => 'Accounts',
        'route' => 'rocket-admin/accounts',
        'permission' => 'LundCustomer\\Controller\\Customer:index',
        'icon' => 'icon-user',
        'order' => 500,
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Customers',
            'route' => 'rocket-admin/accounts/customer',
            'permission' => 'LundCustomer\\Controller\\Customer:index',
            'order' => 501,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Customer',
                'route' => 'rocket-admin/accounts/customer/create',
                'permission' => 'LundCustomer\\Controller\\Customer:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Customer',
                'route' => 'rocket-admin/accounts/customer/edit',
                'permission' => 'LundCustomer\\Controller\\Customer:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Customer',
                'route' => 'rocket-admin/accounts/customer/view',
                'permission' => 'LundCustomer\\Controller\\Customer:view',
                'use_route_match' => true,
              ),
            ),
          ),
          1 => 
          array (
            'label' => 'Retailers',
            'route' => 'rocket-admin/accounts/retailer',
            'permission' => 'LundCustomer\\Controller\\Retailer:index',
            'order' => 502,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Retailer',
                'route' => 'rocket-admin/accounts/retailer/create',
                'permission' => 'LundCustomer\\Controller\\Retailer:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Retailer',
                'route' => 'rocket-admin/accounts/retailer/edit',
                'permission' => 'LundCustomer\\Controller\\Retailer:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Retailer',
                'route' => 'rocket-admin/accounts/retailer/view',
                'permission' => 'LundCustomer\\Controller\\Retailer:view',
                'use_route_match' => true,
              ),
            ),
          ),
        ),
      ),
      2 => 
      array (
        'label' => 'Lund Site Objects',
        'route' => 'rocket-admin/lund',
        'permission' => 'LundSite\\Controller\\NewsRelease:index',
        'icon' => 'icon-asterisk',
        'order' => 550,
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Manage News Releases',
            'route' => 'rocket-admin/lund/news-release',
            'permission' => 'LundSite\\Controller\\NewsRelease:index',
            'order' => 551,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create News Release',
                'route' => 'rocket-admin/lund/news-release/create',
                'permission' => 'LundSite\\Controller\\NewsRelease:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit News Release',
                'route' => 'rocket-admin/lund/news-release/edit',
                'permission' => 'LundSite\\Controller\\NewsRelease:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View News Release',
                'route' => 'rocket-admin/lund/news-release/view',
                'permission' => 'LundSite\\Controller\\NewsRelease:view',
                'use_route_match' => true,
              ),
            ),
          ),
          1 => 
          array (
            'label' => 'Manage Showroom',
            'route' => 'rocket-admin/lund/showroom',
            'permission' => 'LundSite\\Controller\\Showroom:index',
            'order' => 552,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Showroom',
                'route' => 'rocket-admin/lund/showroom/create',
                'permission' => 'LundSite\\Controller\\Showroom:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Showroom',
                'route' => 'rocket-admin/lund/showroom/edit',
                'permission' => 'LundSite\\Controller\\Showroom:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Showroom',
                'route' => 'rocket-admin/lund/showroom/view',
                'permission' => 'LundSite\\Controller\\Showroom:view',
                'use_route_match' => true,
              ),
            ),
          ),
          2 => 
          array (
            'label' => 'Manage Sliders',
            'route' => 'rocket-admin/lund/slider',
            'permission' => 'LundSite\\Controller\\Slider:index',
            'order' => 553,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Slider',
                'route' => 'rocket-admin/lund/slider/create',
                'permission' => 'LundSite\\Controller\\Slider:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Slider',
                'route' => 'rocket-admin/lund/slider/edit',
                'permission' => 'LundSite\\Controller\\Slider:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Slider',
                'route' => 'rocket-admin/lund/slider/view',
                'permission' => 'LundSite\\Controller\\Slider:view',
                'use_route_match' => true,
              ),
            ),
          ),
          3 => 
          array (
            'label' => 'Manage Testimonials',
            'route' => 'rocket-admin/lund/testimonial',
            'permission' => 'LundSite\\Controller\\Testimonial:index',
            'order' => 554,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Testimonial',
                'route' => 'rocket-admin/lund/testimonial/create',
                'permission' => 'LundSite\\Controller\\Testimonial:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Testimonial',
                'route' => 'rocket-admin/lund/testimonial/edit',
                'permission' => 'LundSite\\Controller\\Testimonial:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Testimonial',
                'route' => 'rocket-admin/lund/testimonial/view',
                'permission' => 'LundSite\\Controller\\Testimonial:view',
                'use_route_match' => true,
              ),
            ),
          ),
          4 => 
          array (
            'label' => 'Manage Contact Submissions',
            'route' => 'rocket-admin/lund/contact-submission',
            'permission' => 'LundSite\\Controller\\ContactSubmission:index',
            'order' => 555,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Contact Submission',
                'route' => 'rocket-admin/lund/contact-submission/create',
                'permission' => 'LundSite\\Controller\\ContactSubmission:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Contact Submission',
                'route' => 'rocket-admin/lund/contact-submission/edit',
                'permission' => 'LundSite\\Controller\\ContactSubmission:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Contact Submission',
                'route' => 'rocket-admin/lund/contact-submission/view',
                'permission' => 'LundSite\\Controller\\ContactSubmission:view',
                'use_route_match' => true,
              ),
            ),
          ),
          5 => 
          array (
            'label' => 'Manage Support Requests',
            'route' => 'rocket-admin/lund/support-request',
            'permission' => 'LundSite\\Controller\\SupportRequest:index',
            'order' => 556,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Support Request',
                'route' => 'rocket-admin/lund/support-request/create',
                'permission' => 'LundSite\\Controller\\SupportRequest:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Support Request',
                'route' => 'rocket-admin/lund/support-request/edit',
                'permission' => 'LundSite\\Controller\\SupportRequest:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Support Request',
                'route' => 'rocket-admin/lund/support-request/view',
                'permission' => 'LundSite\\Controller\\SupportRequest:view',
                'use_route_match' => true,
              ),
            ),
          ),
          6 => 
          array (
            'label' => 'Manage Product Registrations',
            'route' => 'rocket-admin/lund/product-registration',
            'permission' => 'LundSite\\Controller\\ProductRegistration:index',
            'order' => 557,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Product Registration',
                'route' => 'rocket-admin/lund/product-registration/create',
                'permission' => 'LundSite\\Controller\\ProductRegistration:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Product Registration',
                'route' => 'rocket-admin/lund/product-registration/edit',
                'permission' => 'LundSite\\Controller\\ProductRegistration:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Product Registration',
                'route' => 'rocket-admin/lund/product-registration/view',
                'permission' => 'LundSite\\Controller\\ProductRegistration:view',
                'use_route_match' => true,
              ),
            ),
          ),
          7 => 
          array (
            'label' => 'Manage Dealers Edge Requests',
            'route' => 'rocket-admin/lund/dealers-edge',
            'permission' => 'LundSite\\Controller\\DealersEdge:index',
            'order' => 558,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Dealers Edge',
                'route' => 'rocket-admin/lund/dealers-edge/create',
                'permission' => 'LundSite\\Controller\\DealersEdge:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Dealers Edge',
                'route' => 'rocket-admin/lund/dealers-edge/edit',
                'permission' => 'LundSite\\Controller\\DealersEdge:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Dealers Edge Request',
                'route' => 'rocket-admin/lund/dealers-edge/view',
                'permission' => 'LundSite\\Controller\\DealersEdge:view',
                'use_route_match' => true,
              ),
            ),
          ),
          8 => 
          array (
            'label' => 'Manage Drivers Council Requests',
            'route' => 'rocket-admin/lund/drivers-council',
            'permission' => 'LundSite\\Controller\\DriversCouncil:index',
            'order' => 559,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Drivers Council',
                'route' => 'rocket-admin/lund/drivers-council/create',
                'permission' => 'LundSite\\Controller\\DriversCouncil:create',
                'use_route_match' => true,
              ),
              1 => 
              array (
                'label' => 'Edit Drivers Council',
                'route' => 'rocket-admin/lund/drivers-council/edit',
                'permission' => 'LundSite\\Controller\\DriversCouncil:edit',
                'use_route_match' => true,
              ),
              2 => 
              array (
                'label' => 'View Drivers Council Request',
                'route' => 'rocket-admin/lund/drivers-council/view',
                'permission' => 'LundSite\\Controller\\DriversCouncil:view',
                'use_route_match' => true,
              ),
            ),
          ),
        ),
      ),
      3 => 
      array (
        'label' => 'Dashboard',
        'route' => 'rocket-admin',
        'permission' => 'RocketAdmin\\Controller\\Index:index',
        'icon' => 'icon-home',
        'order' => '-1',
      ),
      4 => 
      array (
        'label' => 'Messages',
        'route' => 'rocket-admin/message',
        'permission' => 'RocketAdmin\\Controller\\Message:index',
        'visible' => false,
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Create Message',
            'route' => 'rocket-admin/message/create',
            'permission' => 'RocketAdmin\\Controller\\Message:create',
          ),
          1 => 
          array (
            'label' => 'Edit Message',
            'route' => 'rocket-admin/message/edit',
            'use_route_match' => true,
            'permission' => 'RocketAdmin\\Controller\\Message:edit',
          ),
          2 => 
          array (
            'label' => 'View Message',
            'route' => 'rocket-admin/message/view',
            'use_route_match' => true,
            'permission' => 'RocketAdmin\\Controller\\Message:view',
          ),
        ),
      ),
      5 => 
      array (
        'label' => 'Tasks',
        'route' => 'rocket-admin/task',
        'permission' => 'RocketAdmin\\Controller\\Task:index',
        'visible' => false,
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Create Task',
            'route' => 'rocket-admin/task/create',
            'permission' => 'RocketAdmin\\Controller\\Task:create',
          ),
          1 => 
          array (
            'label' => 'Edit Task',
            'route' => 'rocket-admin/task/edit',
            'use_route_match' => true,
            'permission' => 'RocketAdmin\\Controller\\Task:edit',
          ),
          2 => 
          array (
            'label' => 'View Task',
            'route' => 'rocket-admin/task/view',
            'use_route_match' => true,
            'permission' => 'RocketAdmin\\Controller\\Task:view',
          ),
        ),
      ),
      6 => 
      array (
        'label' => 'Asset Management',
        'route' => 'rocket-admin/asset',
        'permission' => 'RocketAdmin\\Controller\\Asset:index',
        'icon' => 'icon-picture',
        'order' => '300',
      ),
      7 => 
      array (
        'label' => 'CMS',
        'route' => 'rocket-admin/cms',
        'permission' => 'RocketAdmin\\Controller\\Site:index',
        'icon' => 'icon-sitemap',
        'order' => '400',
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Manage Sites',
            'route' => 'rocket-admin/cms/site',
            'permission' => 'RocketAdmin\\Controller\\Site:index',
            'order' => 401,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Site',
                'route' => 'rocket-admin/cms/site/create',
                'permission' => 'RocketAdmin\\Controller\\Site:create',
              ),
              1 => 
              array (
                'label' => 'Edit Site',
                'route' => 'rocket-admin/cms/site/edit',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\Site:edit',
              ),
              2 => 
              array (
                'label' => 'View Site',
                'route' => 'rocket-admin/cms/site/view',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\Site:view',
                'pages' => 
                array (
                  0 => 
                  array (
                    'label' => 'Manage Layouts',
                    'route' => 'rocket-admin/cms/site/view/layout',
                    'use_route_match' => true,
                    'permission' => 'RocketAdmin\\Controller\\Layout:index',
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Create Layout',
                        'route' => 'rocket-admin/cms/site/view/layout/create',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Layout:create',
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Layout',
                        'route' => 'rocket-admin/cms/site/view/layout/edit',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Layout:edit',
                      ),
                      2 => 
                      array (
                        'label' => 'View Layout',
                        'route' => 'rocket-admin/cms/site/view/layout/view',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Layout:view',
                      ),
                    ),
                  ),
                  1 => 
                  array (
                    'label' => 'Manage Pages',
                    'route' => 'rocket-admin/cms/site/view/page',
                    'use_route_match' => true,
                    'permission' => 'RocketAdmin\\Controller\\Page:index',
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Create Page',
                        'route' => 'rocket-admin/cms/site/view/page/create',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Page:create',
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Page',
                        'route' => 'rocket-admin/cms/site/view/page/edit',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Page:edit',
                      ),
                      2 => 
                      array (
                        'label' => 'View Page',
                        'route' => 'rocket-admin/cms/site/view/page/view',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Page:view',
                      ),
                    ),
                  ),
                  2 => 
                  array (
                    'label' => 'Manage Menus',
                    'route' => 'rocket-admin/cms/site/view/menu',
                    'use_route_match' => true,
                    'permission' => 'RocketAdmin\\Controller\\Menu:index',
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Create Menu',
                        'route' => 'rocket-admin/cms/site/view/menu/create',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Menu:create',
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Menu',
                        'route' => 'rocket-admin/cms/site/view/menu/edit',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Menu:edit',
                      ),
                      2 => 
                      array (
                        'label' => 'View Menu',
                        'route' => 'rocket-admin/cms/site/view/menu/view',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\Menu:view',
                        'pages' => 
                        array (
                          0 => 
                          array (
                            'label' => 'Manage Menu Elements',
                            'route' => 'rocket-admin/cms/site/view/menu/view/element',
                            'use_route_match' => true,
                            'permission' => 'RocketAdmin\\Controller\\MenuElement:index',
                            'pages' => 
                            array (
                              0 => 
                              array (
                                'label' => 'Create Menu Element',
                                'route' => 'rocket-admin/cms/site/view/menu/view/element/create',
                                'use_route_match' => true,
                                'permission' => 'RocketAdmin\\Controller\\MenuElement:create',
                              ),
                              1 => 
                              array (
                                'label' => 'Edit Menu Element',
                                'route' => 'rocket-admin/cms/site/view/menu/view/element/edit',
                                'use_route_match' => true,
                                'permission' => 'RocketAdmin\\Controller\\MenuElement:edit',
                              ),
                              2 => 
                              array (
                                'label' => 'View Menu Element',
                                'route' => 'rocket-admin/cms/site/view/menu/view/element/view',
                                'use_route_match' => true,
                                'permission' => 'RocketAdmin\\Controller\\MenuElement:view',
                              ),
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          1 => 
          array (
            'label' => 'Manage Templates',
            'route' => 'rocket-admin/cms/template',
            'permission' => 'RocketAdmin\\Controller\\Template:index',
            'order' => 402,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Template',
                'route' => 'rocket-admin/cms/template/create',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\Template:create',
              ),
              1 => 
              array (
                'label' => 'Edit Template',
                'route' => 'rocket-admin/cms/template/edit',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\Template:edit',
              ),
              2 => 
              array (
                'label' => 'View Template',
                'route' => 'rocket-admin/cms/template/view',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\Template:view',
              ),
            ),
          ),
        ),
      ),
      8 => 
      array (
        'label' => 'Order System',
        'route' => 'rocket-admin/order-system',
        'permission' => 'RocketAdmin\\Controller\\Order:index',
        'icon' => 'icon-shopping-cart',
        'order' => '500',
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Manage Orders',
            'route' => 'rocket-admin/order-system/order',
            'permission' => 'RocketAdmin\\Controller\\Order:index',
            'order' => 501,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Order',
                'route' => 'rocket-admin/order-system/order/create',
                'permission' => 'RocketAdmin\\Controller\\Order:create',
              ),
              1 => 
              array (
                'label' => 'Edit Order',
                'route' => 'rocket-admin/order-system/order/edit',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\Order:edit',
              ),
              2 => 
              array (
                'label' => 'View Order',
                'route' => 'rocket-admin/order-system/order/view',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\Order:view',
                'pages' => 
                array (
                  0 => 
                  array (
                    'label' => 'Manage Order Items',
                    'route' => 'rocket-admin/order-system/order/view/order-item',
                    'use_route_match' => true,
                    'permission' => 'RocketAdmin\\Controller\\OrderItem:index',
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Create Order Item',
                        'route' => 'rocket-admin/order-system/order/view/order-item/create',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\OrderItem:create',
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Order Item',
                        'route' => 'rocket-admin/order-system/order/view/order-item/edit',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\OrderItem:edit',
                      ),
                      2 => 
                      array (
                        'label' => 'View Order Item',
                        'route' => 'rocket-admin/order-system/order/view/order-item/view',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\OrderItem:view',
                      ),
                    ),
                  ),
                  1 => 
                  array (
                    'label' => 'Manage Order Addresses',
                    'route' => 'rocket-admin/order-system/order/view/order-address',
                    'use_route_match' => true,
                    'permission' => 'RocketAdmin\\Controller\\OrderAddress:index',
                    'pages' => 
                    array (
                      0 => 
                      array (
                        'label' => 'Create Order Address',
                        'route' => 'rocket-admin/order-system/order/view/order-address/create',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\OrderAddress:create',
                      ),
                      1 => 
                      array (
                        'label' => 'Edit Order Address',
                        'route' => 'rocket-admin/order-system/order/view/order-address/edit',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\OrderAddress:edit',
                      ),
                      2 => 
                      array (
                        'label' => 'View Order Address',
                        'route' => 'rocket-admin/order-system/order/view/order-address/view',
                        'use_route_match' => true,
                        'permission' => 'RocketAdmin\\Controller\\OrderAddress:view',
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          1 => 
          array (
            'label' => 'Manage Shipping Methods',
            'route' => 'rocket-admin/order-system/shipping-method',
            'permission' => 'RocketAdmin\\Controller\\ShippingMethod:index',
            'order' => 502,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create Shipping Method',
                'route' => 'rocket-admin/order-system/shipping-method/create',
                'permission' => 'RocketAdmin\\Controller\\ShippingMethod:create',
              ),
              1 => 
              array (
                'label' => 'Edit Shipping Method',
                'route' => 'rocket-admin/order-system/shipping-method/edit',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\ShippingMethod:edit',
              ),
              2 => 
              array (
                'label' => 'View Shipping Method',
                'route' => 'rocket-admin/order-system/shipping-method/view',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\ShippingMethod:view',
              ),
            ),
          ),
        ),
      ),
      9 => 
      array (
        'label' => 'Settings',
        'route' => 'rocket-admin/settings',
        'permission' => 'RocketAdmin\\Controller\\User:index',
        'icon' => 'icon-cogs',
        'order' => 700,
        'pages' => 
        array (
          0 => 
          array (
            'label' => 'Manage Users',
            'route' => 'rocket-admin/settings/user',
            'permission' => 'RocketAdmin\\Controller\\User:index',
            'order' => 701,
            'pages' => 
            array (
              0 => 
              array (
                'label' => 'Create User',
                'route' => 'rocket-admin/settings/user/create',
                'permission' => 'RocketAdmin\\Controller\\User:create',
              ),
              1 => 
              array (
                'label' => 'Edit User',
                'route' => 'rocket-admin/settings/user/edit',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\User:edit',
              ),
              2 => 
              array (
                'label' => 'View User',
                'route' => 'rocket-admin/settings/user/view',
                'use_route_match' => true,
                'permission' => 'RocketAdmin\\Controller\\User:view',
              ),
              3 => 
              array (
                'label' => 'Profile',
                'route' => 'rocket-admin/settings/user/profile',
                'permission' => 'RocketAdmin\\Controller\\User:profile',
              ),
            ),
          ),
          1 => 
          array (
            'label' => 'View Audit Log',
            'route' => 'rocket-admin/settings/audit',
            'permission' => 'RocketAdmin\\Controller\\Audit:index',
            'order' => 702,
          ),
        ),
      ),
    ),
  ),
  'filters' => 
  array (
    'factories' => 
    array (
      'Aws\\Filter\\File\\S3RenameUpload' => 'Aws\\Factory\\S3RenameUploadFactory',
    ),
    'aliases' => 
    array (
      's3renameupload' => 'Aws\\Filter\\File\\S3RenameUpload',
    ),
  ),
  'view_helpers' => 
  array (
    'factories' => 
    array (
      'Aws\\View\\Helper\\S3Link' => 'Aws\\Factory\\S3LinkViewHelperFactory',
      'Aws\\View\\Helper\\CloudFrontLink' => 'Aws\\Factory\\CloudFrontLinkViewHelperFactory',
    ),
    'aliases' => 
    array (
      'cloudfrontlink' => 'Aws\\View\\Helper\\CloudFrontLink',
      's3link' => 'Aws\\View\\Helper\\S3Link',
    ),
  ),
  'aws' => 
  array (
    'key' => 'AKIAJWVEJYUOKUTX5YTQ',
    'secret' => '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',
    'region' => 'us-east-1',
  ),
  'lund_feeds' => 
  array (
    'part_asset_path' => '/assets/',
  ),
  'rocket_dam' => 
  array (
    'elfinder' => 
    array (
      'disableLayouts' => true,
      'connectorPath' => '/admin/dam/connector',
      'publicFolder' => 'develop.thesmartdata.com/assets',
      'mounts' => 
      array (
        'library' => 
        array (
          'roots' => 
          array (
            'library' => 
            array (
              'driver' => 'LocalFileSystem',
              'path' => '/var/www/SmartDataAdmin/config/autoload/../../public/assets/library',
              'accessControl' => 'access',
              'mimeDetect' => 'internal',
              'imgLib' => 'gd',
            ),
          ),
        ),
        'clients' => 
        array (
          'roots' => 
          array (
            'clients' => 
            array (
              'driver' => 'LocalFileSystem',
              'path' => '/var/www/SmartDataAdmin/config/autoload/../../public/assets/library/clients/',
              'accessControl' => 'access',
              'mimeDetect' => 'internal',
              'imgLib' => 'gd',
            ),
          ),
        ),
      ),
    ),
  ),
  'rocket_user' => 
  array (
    'user' => 
    array (
      'enable_username' => true,
    ),
    'password' => 
    array (
      'bcrypt' => 
      array (
        'cost' => 14,
        'salt' => '60e4fffbd2f16b2a6b40032ecf8f8dcf',
      ),
    ),
    'password_reset' => 
    array (
      'token_validity_interval' => '+24 hours',
    ),
  ),
);
