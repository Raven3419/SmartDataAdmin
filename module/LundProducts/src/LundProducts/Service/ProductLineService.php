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
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Service;

use Zend\EventManager\Eventmanager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LundProducts\Entity\ProductLines;
use LundProducts\Repository\ProductLinesRepositoryInterface;
use LundProducts\Form\ProductLineForm;
use LundProducts\Entity\ProductLinesInterface;
use RocketUser\Entity\User;
use DateTime;
use LundProducts\Service\ProductLineFeatureService;

class ProductLineService implements EventManagerAwareInterface
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
     * @var ObjectRepository
     */
    protected $repository;

    /*
     * @var ProductLineForm
     */
    protected $productLineForm;

    /**
     * @var ProdcuctLinesInterface
     */
    protected $productLinesPrototype;

    /**
     * @var ProductLineFEatureService
     */
    protected $productLineFeatureService;

    /**
     * @param ObjectManager
     * @param ObjectRepository
     * @param ProductLineForm
     * @param ProductLineFeatureService
     */
    public function __construct(ObjectManager                   $objectManager,
                                ProductLinesRepositoryInterface $repository,
                                ProductLineForm                 $productLineForm,
                                ProductLineFeatureService       $productLineFeatureService)
    {
        $this->objectManager   = $objectManager;
        $this->repository      = $repository;
        $this->productLineForm = $productLineForm;
        $this->productLineFeatureService = $productLineFeatureService;
    }

    /**
     * Return count of active product lines
     *
     * @return integer
     */
    public function getCount()
    {
        $dql = 'SELECT COUNT(p) FROM LundProducts\Entity\ProductLines p WHERE p.deleted = :deleted';
        $q = $this->objectManager->createQuery($dql);
        $q->setParameters(array('deleted' => 0));

        return $q->getSingleScalarResult();
    }

    /**
     * @return mixed
     */
    public function getActiveProductLines()
    {
        return $this->repository->findBy(
            array('deleted'  => false),
            array('name' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getFrontActiveProductLines()
    {
        return $this->repository->findBy(
            array(
                'deleted' => false,
                'disabled' => false,
            ),
            array(
                'name' => 'ASC',
            )
        );
    }

    /**
     * Return product lines by brand
     *
     * @param \LundProducts\Entity\BrandsInterface
     * @return ProductLinesInterface|null
     */
    public function getProductLinesByBrand(\LundProducts\Entity\BrandsInterface $brand)
    {
        return $this->repository->findBy(
            array(
                'deleted'  => false,
                'disabled' => false,
                'brand'    => $brand->getBrandId(),
            ),
            array(
                'brandPosition' => 'ASC',
            )
        );
    }

    /**
     * Return product lines by product category
     *
     * @param \LundProducts\Entity\ProductCategoriesInterface
     * @param \LundProducts\Entity\BrandsInterface
     * @return ProductLinesInterface|null
     */
    public function getProductLinesByCategory(\LundProducts\Entity\ProductCategoriesInterface $category, \LundProducts\Entity\BrandsInterface $brand)
    {
        return $this->repository->findBy(
            array(
                'deleted'  => false,
                'disabled' => false,
                'productCategory' => $category->getProductCategoryId(),
                'brand'           => $brand->getBrandId(),
            ),
            array(
                'position' => 'ASC',
            )
        );
    }

    /**
     * Return product line by name
     *
     * @param  string                     $name
     * @return ProductLinesInterface|null
     */
    public function getProductLineByName($name = null)
    {
        return $this->repository->findOneBy(
            array(
                'deleted'  => false,
                'disabled' => false,
                'name'     => $name,
            )
        );
    }

    /**
     * Return product line by name
     *
     * @param  string                     $name
     * @return ProductLinesInterface|null
     */
    public function getProductLineByQuery($name = null)
    {
        return $this->repository->findByQuery(
            array(
                'deleted'  => false,
                'disabled' => false,
                'name'     => $name,
            )
        );
    }

    /**
     * Return view ProductLineForm
     *
     * @param  string          $productLineId
     * @return ProductLineForm
     */
    public function getViewProductLineForm($productLineId)
    {
        $productLine = $this->repository->find($productLineId);

        $this->productLineForm->bind($productLine);

        return $this->productLineForm;
    }

    /**
     * Return create ProductLineForm
     *
     * @return ProductLineForm
     */
    public function getCreateProductLineForm()
    {
        $this->productLineForm->bind(clone $this->getProductLinesPrototype());

        return $this->productLineForm;
    }

    /**
     * Return edit ProductLineForm
     *
     * @param  string          $productLineId
     * @return ProductLineForm
     */
    public function getEditProductLineForm($productLineId)
    {
        $productLine = $this->repository->find($productLineId);

        $this->productLineForm->bind($productLine);

        return $this->productLineForm;
    }

    /**
     * @return ProductLinesInterface
     */
    public function getProductLinesPrototype()
    {
        if ($this->productLinesPrototype === null) {
            $this->setProductLinesPrototype(new ProductLines());
        }

        return $this->productLinesPrototype;
    }

    /**
     * @param  ProductLinesInterface $productLinesPrototype
     * @return ProductLineService
     */
    public function setProductLinesPrototype(ProductLinesInterface $productLinesPrototype)
    {
        $this->productLinesPrototype = $productLinesPrototype;

        return $this;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getProductLine($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\ProductLines $recordEntity
     * @param \Admin\Entity\User         $usersEntity
     *
     * @return \Admin\Entity\ProductLines $recordEntity
     */
    public function createProductLine(ProductLines $recordEntity, User $usersEntity)
    {
        $recordEntity->setCreatedAt(new DateTime('now'))
            ->setCreatedBy($usersEntity->getUsername())
            ->setDeleted(false)
            ->setDisabled(false);
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        $this->flushCache();

        return $recordEntity;
    }

    /**
     * @param \LundProducts\Entity\ProductLines $recordEntity
     * @param array                             $features
     *
     * @return \LundProducts\Entity\ProductLines
     */
    public function editProductLineCopy(ProductLines $recordEntity, $features = null)
    {
        if (is_array($features)) {
            $iterator = 1;
            foreach ($features as $feature) {
                if (strlen($feature)>1) {
                    $this->productLineFeatureService->create($recordEntity, $iterator, $feature);
                    $iterator++;
                }
            }
        }

        $recordEntity->setModifiedAt(new DateTime('now'));
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        $this->flushCache();

        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\ProductLines $recordEntity
     * @param \Admin\Entity\User         $usersEntity
     *
     * @return \Admin\Entity\ProductLines $recordEntity
     */
    public function editProductLine(ProductLines $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        $this->flushCache();

        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\ProductLines $recordEntity
     * @param \Admin\Entity\User         $usersEntity
     *
     * @return \Admin\Entity\ProductLines $recordEntity
     */
    public function deleteProductLine(ProductLines $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername())
            ->setDeleted(true)
            ->setDisabled(true);
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        $this->flushCache();

        return $recordEntity;
    }

    /**
     * @return void
     */
    public function flushCache()
    {
        $cacheDriver = $this->objectManager->getConfiguration()->getResultCacheImpl();
        $cacheDriver->delete('productlines_find_active');
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
