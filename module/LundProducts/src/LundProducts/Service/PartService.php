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

use Zend\EventManager\Eventmanager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\Common\Persistence\ObjectManager;
use LundProducts\Entity\Parts;
use LundProducts\Entity\PartsInterface;
use LundProducts\Entity\BrandsInterface;
use LundProducts\Repository\PartsRepositoryInterface;
use LundProducts\Entity\ProductLinesInterface;
use RocketUser\Entity\User;
use DateTime;

/*
 * Service managing the CRUD of brands.
 */
class PartService implements EventManagerAwareInterface
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

    /**
     * @var PartsForm
     */
    protected $partsForm;

    /**
     * @var PartsInterface
     */
    protected $partsPrototype;

    /**
     * @param ObjectManager            $objectManager
     * @param PartsRepositoryInterface $repository
     * @param FormInterface            $partsForm
     */
    public function __construct(
        ObjectManager             $objectManager,
        PartsRepositoryInterface  $repository,
        FormInterface             $partsForm
    )
    {
        $this->objectManager = $objectManager;
        $this->repository    = $repository;
        $this->partsForm     = $partsForm;
    }

    /**
     * Return count of active parts
     *
     * @return integer
     */
    public function getCount()
    {
        $dql = 'SELECT COUNT(p) FROM LundProducts\Entity\Parts p WHERE p.deleted = :deleted';
        $q = $this->objectManager->createQuery($dql);
        $q->setParameters(array('deleted' => 0));

        return $q->getSingleScalarResult();
    }

    /**
     * Return view PartForm
     *
     * @param  string   $partId
     * @return PartForm
     */
    public function getViewPartForm($partId)
    {
        $part = $this->repository->find($partId);

        $this->partsForm->bind($part);

        return $this->partsForm;
    }

    /**
     * Return create PartForm
     *
     * @return PartForm
     */
    public function getCreatePartForm()
    {
        $this->partsForm->bind(clone $this->getPartsPrototype());

        return $this->partsForm;
    }

    /**
     * Return edit PartForm
     *
     * @param  string   $partId
     * @return PartForm
     */
    public function getEditPartForm($partId)
    {
        $part = $this->repository->find($partId);

        $this->partsForm->bind($part);

        return $this->partsForm;
    }

    /**
     * @return PartsInterface
     */
    public function getPartsPrototype()
    {
        if ($this->partsPrototype === null) {
            $this->setPartsPrototype(new Parts());
        }

        return $this->partsPrototype;
    }

    /**
     * @param  PartsInterface $partsPrototype
     * @return PartService
     */
    public function setPartsPrototype(PartsInterface $partsPrototype)
    {
        $this->partsPrototype = $partsPrototype;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActiveParts($limit = null, $offset = null, $orderBy = array(), $sSearch = null)
    {
        return $this->repository->findActive($limit, $offset, $orderBy, $sSearch);
    }

    /*
     * @return mixed
     */
    public function getPartsByProductLine(ProductLinesInterface $productLine)
    {
        return $this->repository->findBy(
            array(
                'deleted' => false,
                'disabled' => false,
                'productLine' => $productLine->getProductLineId(),
            ),
            array(
                'partNumber' => 'ASC',
            )
        );
    }

    /**
     * @return mixed
     */
    public function getUniversalPartsByProductLine(ProductLinesInterface $productLine)
    {
        return $this->repository->findBy(
            array(
                'deleted' => false,
                'disabled' => false,
                'universal' => true,
                'productLine' => $productLine->getProductLineId(),
            ),
            array(
                'partNumber' => 'ASC',
            )
        );
    }

    /**
     * @return mixed
     */
    public function getUniversalParts()
    {
        return $this->repository->findBy(
            array(
                'deleted' => false,
                'disabled' => false,
                'universal' => true,
            ),
            array(
                'partNumber' => 'ASC',
            )
        );
    }

    /**
     * @param BrandsInterface $brand
     * @param string          $generate
     * @param int             $changeset_id
     * @param string          $lundonly
     */
    public function getAcesParts(
        $brand        = null,
        $generate     = null,
        $changeset_id = null,
        $lundonly     = null
    )
    {
        return $this->repository->findAcesParts($brand, $changeset_id, $lundonly, $generate);
    }

    /**
     * @param BrandsInterface $brand
     * @param string          $generate
     * @param int             $changeset_id
     */
    public function getPartsForImages(
        $brand        = null,
        $generate     = null,
        $changeset_id = null,
        $lundonly     = null
    )
    {
        return $this->repository->findAcesParts($brand, $changeset_id, $lundonly);
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getPart($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param string $partNumber
     *
     * @return mixed
     */
    public function getPartByPartNumber($partNumber)
    {
        return $this->repository->findOneBy(array('partNumber' => $partNumber));
    }

    /**
     * @param \Admin\Entity\Parts $recordEntity
     * @param \Admin\Entity\User  $usersEntity
     *
     * @return \Admin\Entity\Parts $recordEntity
     */
    public function createPart(Parts $recordEntity, User $usersEntity)
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
     * @param \Admin\Entity\Parts $recordEntity
     * @param \Admin\Entity\User  $usersEntity
     *
     * @return \Admin\Entity\Parts $recordEntity
     */
    public function editPart(Parts $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        $this->flushCache();

        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Parts $recordEntity
     * @param \Admin\Entity\User  $usersEntity
     *
     * @return \Admin\Entity\Parts $recordEntity
     */
    public function deletePart(Parts $recordEntity, User $usersEntity)
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
     * @param Parts $recordEntity
     * @param User  $usersEntity
     *
     * @return Parts $recordEntity
     */
    public function disablePart(Parts $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername())
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
        $cacheDriver->delete('parts_find_active');
    }

    public function getPartsTotalCount($sSearch = null)
    {
        return $this->repository->getTotalRows($sSearch);
    }

    public function getPartListings(AbstractActionController $controller, $limit = null, $offset = null, $sEcho = null, $sortingCols = null, $sSearch = null)
    {
        $columns = array('r.partNumber', 'r.upcCode', 'r.productLine', 'r.color', 'r.msrpPrice', 'r.isheet');
        $orderBy = array();

        if ($sortingCols > 0) {
            for ($i = 0; $i < $sortingCols; $i++) {
                if ($controller->params()->fromQuery('bSortable_' . $controller->params()->fromQuery('iSortCol_' . $i)) == 'true') {
                    // column name
                    $orderBy[] = $columns[(INT)$controller->params()->fromQuery('iSortCol_' . $i)];
                    // order direction
                    $orderBy[] = (($controller->params()->fromQuery('sSortDir_' . $i) === 'asc') ? 'ASC' : 'DESC');
                }
            }
        }

        $records           = $this->getActiveParts($limit, $offset, $orderBy, $sSearch);
        $recordsCount      = count($records);
        $totalRecordsCount = $this->getPartsTotalCount($sSearch);
        $aaData            = array();

        if ($recordsCount > 0) {
            foreach ($records as $record) {
                $aaData[] = array($record->getPartNumber(),
                                  $record->getUpcCode(),
                                  ['id' => $record->getProductLine()->getProductLineId(),
                                   'name' => $record->getProductLine()->getName()],
                                  $record->getColor(),
                                  $record->getMsrpPrice(),
                                  ['id' => $record->getPartId(),
                                   'isheet' => $record->getIsheet()],
                                  $record->getPartId()
                );
            }
        }

        return array('sEcho'                => $sEcho,
                     'aaData'               => $aaData,
                     'iTotalRecords'        => $totalRecordsCount,
                     'iTotalDisplayRecords' => $totalRecordsCount);
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
