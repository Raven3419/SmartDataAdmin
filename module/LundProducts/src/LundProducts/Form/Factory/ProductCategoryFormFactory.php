<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts\Form
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\Form\Factory;

use LundProducts\Form\ProductCategoryForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see ProductCategoryForm}
 *
 * @category   Zend
 * @package    LundProducts\Form
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class ProductCategoryFormFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ProductCategoryForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();

        $form = new ProductCategoryForm();

        $formFilter = new \Zend\InputFilter\InputFilter();
        $fieldsetInputFilter = $parentLocator->get('InputFilterManager')->get('LundProducts\InputFilter\ProductCategoryFilter');
        $formFilter->add($fieldsetInputFilter, 'product-category-fieldset');

        $form->setInputFilter($formFilter);

        return $form;
    }
}
