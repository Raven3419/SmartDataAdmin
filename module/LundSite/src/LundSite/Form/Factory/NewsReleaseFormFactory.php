<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite\Form
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundSite\Form\Factory;

use LundSite\Form\NewsReleaseForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see NewsReleaseForm}
 *
 * @category   Zend
 * @package    LundSite\Form
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class NewsReleaseFormFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return NewsReleaseForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();

        $form = new NewsReleaseForm();

        $formFilter = new \Zend\InputFilter\InputFilter();
        $fieldsetInputFilter = $parentLocator->get('InputFilterManager')->get('LundSite\InputFilter\NewsReleaseFilter');
        $formFilter->add($fieldsetInputFilter, 'news-release-fieldset');

        $form->setInputFilter($formFilter);

        return $form;
    }
}
