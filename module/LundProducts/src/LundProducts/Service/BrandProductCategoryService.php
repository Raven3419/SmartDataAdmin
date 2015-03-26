<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Service
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Service;

use RocketUser\Entity\UserInterface;
use LundProducts\Entity\BrandProductCategory;
use LundProducts\Entity\BrandProductCategoryInterface;
use LundProducts\Entity\BrandsInterface;
use LundProducts\Entity\ProductCategoriesInterface;
use LundProducts\Repository\BrandProductCategoryRepositoryInterface;
use RocketUser\Repository\UserRepositoryInterface;
use LundProducts\Repository\BrandsRepositoryInterface;
use LundProducts\Repository\ProductCategoriesRepositoryInterface;
use LundProducts\Form\BrandProductCategoryForm;
use LundProducts\Options\LundProductsOptionsInterface;
use LundProducts\Exception;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Form\FormInterface;
use DateTime;

/**
 * Service managing the management of brand product categorys.
 */
class BrandProductCategoryService implements EventManagerAwareInterface
{
    /**
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * @var BrandProductCategoryRepositoryInterface
     */
    protected $brandProductCategoryRepository;

    /**
     * @var BrandsRepositoryInterface
     */
    protected $brandRepository;

    /**
     * @var ProductCategoriesRepositoryInterface
     */
    protected $productCategoryRepository;

    /**
     * @var BrandProductCategoryForm
     */
    protected $brandProductCategoryForm;

    /**
     * @var LundProductsOptionsInterface
     */
    protected $options;

    /**
     * @var BrandProductCategoryInterface
     */
    protected $brandProductCategoryPrototype;

    /**
     * @param ObjectManager                       $objectManager
     * @param UserRepositoryInterface             $userRepository
     * @param BrandProductCategoryRepositoryInterface $brandProductCategoryRepository
     * @param BrandsRepositoryInterface     $brandRepository
     * @param ProductCategoriesRepositoryInterface            $productCategoryRepository
     * @param FormInterface                       $brandProductCategoryForm
     * @param LundProductsOptionsInterface        $options
     */
    public function __construct(
        ObjectManager $objectManager,
        UserRepositoryInterface $userRepository,
        BrandProductCategoryRepositoryInterface $brandProductCategoryRepository,
        BrandsRepositoryInterface $brandRepository,
        ProductCategoriesRepositoryInterface $productCategoryRepository,
        FormInterface $brandProductCategoryForm,
        LundProductsOptionsInterface $options
    ) {
        $this->objectManager  = $objectManager;
        $this->userRepository = $userRepository;
        $this->brandProductCategoryRepository = $brandProductCategoryRepository;
        $this->brandRepository     = $brandRepository;
        $this->productCategoryRepository     = $productCategoryRepository;
        $this->brandProductCategoryForm       = $brandProductCategoryForm;
        $this->options        = $options;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getBrandProductCategory($recordId)
    {
        return $this->brandProductCategoryRepository->find($recordId);
    }

    /**
     * Return a list of active brand product categories
     *
     * @return BrandProductCategoryInterface
     */
    public function getBrandProductCategories()
    {
        return $this->brandProductCategoryRepository->findBy(
            array(
                'deleted' => false,
                'disabled' => false,
            ),
            array(
                'position' => 'ASC',
            )
        );
    }

    /**
     * Return a list of brand product categories for a brand
     *
     * @param  BrandsInterface     $brand
     * @return BrandProductCategoryInterface
     */
    public function getBrandProductCategoriesByBrand(BrandsInterface $brand)
    {
        return $this->brandProductCategoryRepository->findBy(
            array(
                'brand' => $brand->getBrandId(),
            ),
            array(
                'position' => 'ASC',
            )
        );
    }

    /**
     * Return a list of active brand product categories for a brand
     *
     * @param  BrandsInterface     $brand
     * @return BrandProductCategoryInterface
     */
    public function getActiveBrandProductCategoriesByBrand(BrandsInterface $brand)
    {
        return $this->brandProductCategoryRepository->findBy(
            array(
                'brand' => $brand->getBrandId(),
                'deleted' => false,
                'disabled' => false,
            ),
            array(
                'position' => 'ASC',
            )
        );
    }

    /**
     * Return a list of brand product categories for a product category
     *
     * @param  ProductCategoriesInterface            $productCategory
     * @return BrandProductCategoryInterface
     */
    public function getBrandProductCategoryByProductCategory(ProductCategoriesInterface $productCategory)
    {
        return $this->brandProductCategoryRepository->findBy(
            array(
                'productCategory' => $productCategory->getProductCategoryId(),
            ),
            array(
                'position' => 'ASC',
            )
        );
    }

    /**
     * Return a brand product category record
     *
     * @param BrandsInterface                $brand
     * @param ProductCategoriesInterface     $productCategory
     * @return BrandProductCategoryInterface
     */
    public function getCategoryByBrandAndCategory(BrandsInterface $brand, ProductCategoriesInterface $productCategory)
    {
        return $this->brandProductCategoryRepository->findOneBy(
            array(
                'productCategory' => $productCategory->getProductCategoryId(),
                'brand'           => $brand->getBrandId(),
            )
        );
    }

    /**
     * Return boolean on duplicate check
     *
     * @param  BrandsInterface $brand
     * @param  ProductCategoriesInterface        $productCategory
     * @return boolean
     */
    public function duplicateCheck(BrandsInterface $brand, ProductCategoriesInterface $productCategory)
    {
        return $this->brandProductCategoryRepository->findBy(
            array(
                'brand'  => $brand->getBrandId(),
                'productCategory' => $productCategory->getProductCategoryId(),
            )
        );
    }

    /**
     * Return create brand product category form
     *
     * @return BrandProductCategoryForm
     */
    public function getCreateBrandProductCategoryForm()
    {
        $this->brandProductCategoryForm->bind(clone $this->getBrandProductCategoryPrototype());

        return $this->brandProductCategoryForm;
    }

    /**
     * Return edit brand product category form
     *
     * @param  string               $brandProductCategoryId
     * @return BrandProductCategoryForm
     */
    public function getEditBrandProductCategoryForm($brandProductCategoryId)
    {
        $brandProductCategory = $this->brandProductCategoryRepository->find($brandProductCategoryId);

        $this->brandProductCategoryForm->bind($brandProductCategory);

        return $this->brandProductCategoryForm;
    }

    /**
     * Create a new brand product category relationship
     *
     * @param  BrandsInterface          $brand
     * @param  ProductCategoriesInterface                 $productCategory
     * @param  string                             $createdBy
     * @param  boolean                            $disabled
     * @param  boolean                            $displayStyles
     * @param  boolean                            $featured
     * @param  integer                            $position
     * @param  string                             $shortDescr
     * @param  string                             $longDescr
     * @param  string                             $metaTitle
     * @param  string                             $metakeywords
     * @param  string                             $metaDescr
     * @return null|BrandProductCategoryInterface
     */
    public function create(
        BrandsInterface $brand,
        ProductCategoriesInterface $productCategory,
        $createdBy = null,
        $disabled = null,
        $displayStyles = null,
        $featured = null,
        $position = null,
        $shortDescr = null,
        $longDescr = null,
        $metaTitle = null,
        $metaKeywords = null,
        $metaDescr = null)
    {
        $brandProductCategory = clone $this->getBrandProductCategoryPrototype();
        $brandProductCategory->setBrand($brand)
            ->setProductCategory($productCategory)
            ->setCreatedBy($createdBy)
            ->setDisabled($disabled)
            ->setDisplayStyles($displayStyles)
            ->setFeatured($featured)
            ->setPosition($position)
            ->setShortDescr($shortDescr)
            ->setLongDescr($longDescr)
            ->setMetaTitle($metaTitle)
            ->setMetaKeywords($metaKeywords)
            ->setMetaDescr($metaDescr);

        $this->objectManager->persist($brandProductCategory);
        $this->objectManager->flush();

        return $brandProductCategory;
    }

    /**
     * Flush entitymanager
     */
    public function flushObject()
    {
        $this->objectManager->clear();
    }

    /**
     * Creates a new brand product category.
     *
     * @param  UserInterface                      $identity
     * @param  BrandsInterface                    $brand
     * @param  \Zend\Stdlib\Parameters            $data
     * @throws Exception\UnexpectedValueException
     * @return null|BrandProductCategoryInterface
     */
    public function createRecord(UserInterface $identity, BrandsInterface $brand, \Zend\Stdlib\Parameters $data)
    {
        $this->brandProductCategoryForm->bind(clone $this->getBrandProductCategoryPrototype());
        $this->brandProductCategoryForm->setData($data);

        if (!$this->brandProductCategoryForm->isValid()) {
            return null;
        }

        $brandProductCategory = $this->brandProductCategoryForm->getData();

        if (!$brandProductCategory instanceof BrandProductCategoryInterface) {
            throw Exception\UnexpectedValueException::invalidBrandProductCategoryEntity($brandProductCategory);
        }

        $brandProductCategory->setBrand($brand)
            ->setCreatedAt(new DateTime('now'))
            ->setCreatedBy($identity->getUsername())
            ->setDeleted(false);

        $this->objectManager->persist($brandProductCategory);
        $this->objectManager->flush();

        $this->getEventManager()->trigger(new BrandProductCategoryEvent('brandProductCategoryCreated', $brandProductCategory));

        return $brandProductCategory;
    }

    /**
     * Edit an existing brand product category.
     *
     * @param  UserInterface                      $identity
     * @param  \Zend\Stdlib\Parameters            $data
     * @param  BrandProductCategoryInterface          $brandProductCategory
     * @throws Exception\UnexpectedValueException
     * @return null|BrandProductCategoryInterface
     */
    public function editRecord(UserInterface $identity, \Zend\Stdlib\Parameters $data, BrandProductCategoryInterface $brandProductCategory)
    {
        $this->brandProductCategoryForm->bind($brandProductCategory);
        $this->brandProductCategoryForm->setData($data);

        if (!$this->brandProductCategoryForm->isValid()) {
            return null;
        }

        $brandProductCategory = $this->brandProductCategoryForm->getData();

        if (!$brandProductCategory instanceof BrandProductCategoryInterface) {
            throw Exception\UnexpectedValueException::invalidBrandProductCategoryEntity($brandProductCategory);
        }

        $brandProductCategory->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($identity->getUsername());

        $this->objectManager->flush();

        $this->getEventManager()->trigger(new BrandProductCategoryEvent('brandProductCategoryEdited', $brandProductCategory));

        return $brandProductCategory;
    }

    /**
     * Delete an existing brand product category.
     *
     * @param  UserInterface                      $identity
     * @param  BrandProductCategoryInterface          $brandProductCategory
     * @throws Exception\UnexpectedValueException
     * @return null|BrandProductCategoryInterface
     */
    public function delete(UserInterface $identity, BrandProductCategoryInterface $brandProductCategory)
    {
        if (!$brandProductCategory instanceof BrandProductCategoryInterface) {
            throw Exception\UnexpectedValueException::invalidBrandProductCategoryEntity($brandProductCategory);
        }

        $this->objectManager->remove($brandProductCategory);
        $this->objectManager->flush();

        $this->getEventManager()->trigger(new BrandProductCategoryEvent('brandProductCategoryDeleted', $brandProductCategory));

        return $brandProductCategory;
    }

    /**
     * @return BrandProductCategoryInterface
     */
    public function getBrandProductCategoryPrototype()
    {
        if ($this->brandProductCategoryPrototype === null) {
            $this->setBrandProductCategoryPrototype(new BrandProductCategory());
        }

        return $this->brandProductCategoryPrototype;
    }

    /**
     * @param  BrandProductCategoryInterface $brandProductCategoryPrototype
     * @return BrandProductCategoryService
     */
    public function setBrandProductCategoryPrototype(BrandProductCategoryInterface $brandProductCategoryPrototype)
    {
        $this->brandProductCategoryPrototype = $brandProductCategoryPrototype;

        return $this;
    }

    /**
     * setEventManager(): defined by EventManagerAwareInterface.
     *
     * @see    EventManagerAwareInterface::setEventManager()
     * @param  EventManagerInterface $eventManager
     * @return void
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(array(__CLASS__, get_class($this)));

        $this->eventManager = $eventManager;
    }

    /**
     * getEventManager(): defined by EventManagerAwareInterface.
     *
     * @see    EventManagerAwareInterface::getEventManager()
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (null === $this->eventManager) {
            $this->setEventManager(new EventManager());
        }

        return $this->eventManager;
    }
}
