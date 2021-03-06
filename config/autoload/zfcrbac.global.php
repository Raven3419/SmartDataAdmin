<?php
return array(
    'zfcrbac' => array(
        'anonymousRole' => 'guest',
        'firewallRoute' => false,
        'firewallController' => true,
        'template' => 'admin-error/403',
        'firewalls' => array(
            'ZfcRbac\Firewall\Controller' => array(
                array('controller' => 'Application\Controller\Index', 'roles' => 'guest'),
                array('controller' => 'RocketAdmin\Controller\Index', 'roles' => 'staff'),
                array('controller' => 'RokcetAdmin\Controller\Message', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\User', 'roles' => 'administrator'),
                array('controller' => 'RocketAdmin\Controller\Task', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\Audit', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\Asset', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\Audit', 'roles' => 'administrator'),
                array('controller' => 'RocketAdmin\Controller\Connector', 'roles' => 'guest'),
                array('controller' => 'RocketAdmin\Controller\Layout', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\Login', 'roles' => 'guest'),
                array('controller' => 'RocketAdmin\Controller\Menu', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\MenuElement', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\Page', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\Site', 'roles' => 'staff'),
                array('controller' => 'RocketAdmin\Controller\Template', 'roles' => 'staff'),
                array('controller' => 'LundCustomer\Controller\Customer', 'roles' => 'staff'),
                array('controller' => 'LundCustomer\Controller\Parse', 'roles' => 'guest'),
                array('controller' => 'LundCustomer\Controller\Monitor', 'roles' => 'guest'),
                array('controller' => 'LundCustomer\Controller\Retailer', 'roles' => 'staff'),
                array('controller' => 'LundCustomer\Controller\Transmit', 'roles' => 'guest'),
                array('controller' => 'LundProducts\Controller\Brands', 'roles' => 'staff'),
                array('controller' => 'LundProducts\Controller\Changesets', 'roles' => 'staff'),
                array('controller' => 'LundProducts\Controller\Generate', 'roles' => 'guest'),
                array('controller' => 'LundProducts\Controller\Imagine', 'roles' => 'guest'),
                array('controller' => 'LundProducts\Controller\Monitor', 'roles' => 'guest'),
                array('controller' => 'LundProducts\Controller\Parse', 'roles' => 'guest'),
                array('controller' => 'LundProducts\Controller\Parts', 'roles' => 'staff'),
                array('controller' => 'LundProducts\Controller\ProductCategories', 'roles' => 'staff'),
                array('controller' => 'LundProducts\Controller\ProductLines', 'roles' => 'staff'),
                array('controller' => 'LundProducts\Controller\ProductReviews', 'roles' => 'staff'),
                array('controller' => 'LundProducts\Controller\Vehicles', 'roles' => 'staff'),
                array('controller' => 'LundFeeds\Controller\Aces', 'roles' => 'guest'),
                array('controller' => 'LundFeeds\Controller\Pies', 'roles' => 'guest'),
                array('controller' => 'LundSite\Controller\NewsRelease', 'roles' => 'staff'),
                array('controller' => 'LundSite\Controller\ContactSubmission', 'roles' => 'staff'),
                array('controller' => 'LundSite\Controller\DealersEdge', 'roles' => 'staff'),
                array('controller' => 'LundSite\Controller\DriversCouncil', 'roles' => 'staff'),
                array('controller' => 'LundSite\Controller\ProductRegistration', 'roles' => 'staff'),
                array('controller' => 'LundSite\Controller\SupportRequest', 'roles' => 'staff'),
                array('controller' => 'LundSite\Controller\Showroom', 'roles' => 'staff'),
                array('controller' => 'LundSite\Controller\Slider', 'roles' => 'staff'),
            ),
        ),
        'providers' => array(
            'ZfcRbac\Provider\AdjacencyList\Role\DoctrineDbal' => array(
                'connection' => 'doctrine.connection.orm_default',
                'options' => array(
                    'table'       => 'rbac_role',
                    'id_column'   => 'role_id',
                    'name_column' => 'role_name',
                    'join_column' => 'parent_role_id',
                ),
            ),
            'ZfcRbac\Provider\Generic\Permission\DoctrineDbal' => array(
                'connection' => 'doctrine.connection.orm_default',
                'options' => array(
                    'permission_table'       => 'rbac_permission',
                    'role_table'             => 'rbac_role',
                    'role_join_table'        => 'rbac_role_permission',
                    'permission_id_column'   => 'perm_id',
                    'permission_join_column' => 'perm_id',
                    'permission_name_column' => 'perm_name',
                    'role_id_column'         => 'role_id',
                    'role_join_column'       => 'role_id',
                    'role_name_column'       => 'role_name',
                ),
            ),
        ),
        'identity_provider' => 'standard_identity',
    ),
);
