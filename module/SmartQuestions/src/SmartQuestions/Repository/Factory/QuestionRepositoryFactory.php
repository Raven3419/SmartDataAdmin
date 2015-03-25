<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\Repository\Factory;

use SmartQuestions\Repository\QuestionsRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * QuestionsRepositoryFactory
 *
 * @category   Zend
 * @package    SmartQuestions\Repository
 * @subpackage Factory
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class QuestionsRepositoryFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see   FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ChangesetsRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new QuestionsRepository(
            $serviceLocator->get('SmartQuestions\ObjectManager')->getRepository('SmartQuestions\Entity\Questions')
        );
    }
}
