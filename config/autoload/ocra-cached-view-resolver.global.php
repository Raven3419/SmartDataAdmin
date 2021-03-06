<?php
/**
 * This configuration is for OcraCachedViewResolver - copy it to the `config/autoload`
 * directory of your ZF2 application and remove the `.dist` extension from its name.
 *
 * Don't forget to tweak it for your needs!
 */

return array(
    'ocra_cached_view_resolver' => array(
        // configuration to be passed to `Zend\Cache\StorageFactory#factory()`
        'cache' => array(
            'adapter' => array(
                'name'    => 'memcached',
                'options' => array(
                    'ttl' => 84600,
                    'namespace' => 'app_view_resolver_' . sha1(realpath(__FILE__)),
                    'servers' => array(
                        array('localhost', 11211),
                    ),
                ),
            ),
        ),
        // following is the key used to store the template map in the cache adapter
        'cached_template_map_key' => 'cached_template_map',
    ),
);
