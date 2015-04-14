<?php

namespace SmartAccounts\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use SmartAccounts\Service\Options;

class OptionsFactory implements FactoryInterface
{
    /**
     * Create Options instance from config
     *
     * @param ServiceLocatorInterface $sl
     *
     * @return SmartAccounts\Service\Options
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $config = $sl->get('Config');

        $options = isset($config['rr_admin']['options']) ?
            $config['rr_admin']['options'] :
            array();

        return new Options($options);
    }
}
