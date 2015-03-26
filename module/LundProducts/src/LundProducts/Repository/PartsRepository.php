<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * @category   Zend
 * @package    LundProducts
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Repository;

use LundProducts\Repository\PartsRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Persistence\ObjectManager;
use RocketUser\Entity\UserInterface;
use LundProducts\Entity\BrandsInterface;
use LundProducts\Entity\PartsInterface;
use LundProducts\Entity\ChangesetDetailsInterface;
use LundProducts\Repository\ChangsetsRepository;
use LundProducts\Entity\ProductLinesItnerface;
use DateTime;

/**
 * Parts Repository
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class PartsRepository implements PartsRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var ObjectRepository
     */
    protected $partsRepository;

    /**
     * @var ChangesetsRepository
     */
    protected $changesetsRepository;

    /**
     * @param ObjectManager    $objectManager
     * @param ObjectRepository $partsRepository
     */
    public function __construct(
        ObjectManager        $objectManager,
        ObjectRepository     $partsRepository,
        ChangesetsRepository $changesetsRepository)
    {
        $this->objectManager        = $objectManager;
        $this->partsRepository      = $partsRepository;
        $this->changesetsRepository = $changesetsRepository;
    }

    /**
     * Return all active records
     *
     * @return Parts
     */
    public function findActive($limit = null, $offset = null, $orderBy = array(), $sSearch = null)
    {
        $query = $this->objectManager->createQueryBuilder('r');
        $query = $this->buildQuery($query);

        if (((INT)$limit >= 0) && ((INT)$offset >= 0)) {
            $query->setFirstResult($offset)
                  ->setMaxResults($limit);
        }

        if ($sSearch != null) {
            $query = $this->buildWhere($query, $sSearch);
        }

        if ($orderBy) {
            $query->orderBy($orderBy[0], $orderBy[1]);
        }

        return $query->getQuery()
                     ->useResultCache(true, 7200, 'parts_find_active')
                     ->getResult();
    }

    /**
     * @param BrandsInterface|null $brand
     * @param int|null             $changeset_id
     * @param string               $lundonly
     * @param string               $generate
     *
     * @return PartsInterface[]
     */
    public function findAcesParts($brand = null, $changeset_id = null, $lundonly = null, $generate = null)
    {
        $query = $this->objectManager->createQueryBuilder('r');
        $query = $this->buildQuery($query);

        $forceAnd = null;

        if (null != $brand) {
            // filter by given brand
            if ($brand->getName() == 'LUND' && null == $lundonly) {
                $query->where('r.productLine IN (SELECT pl2.productLineId FROM LundProducts\Entity\ProductLines pl2 WHERE pl2.brand = (SELECT b.brandId FROM LundProducts\Entity\Brands b WHERE b.name = \'' . $brand->getName() . '\'))');
                $forceAnd = true;
            } else {
                $query->where('r.productLine IN (SELECT pl2.productLineId FROM LundProducts\Entity\ProductLines pl2 WHERE pl2.origBrand = (SELECT b.brandId FROM LundProducts\Entity\Brands b WHERE b.name = \'' . $brand->getName() . '\'))');
                $forceAnd = true;
            }
        }

        if (null != $changeset_id && null != $generate && $generate != 'full') {
            $changeset            = $this->changesetsRepository->find($changeset_id);
            $changeset_detail_ids = [];

            if ((INT)$changeset_id > 0) {
                foreach ($changeset->getChangesetDetails() as $detail) {
                    $changeset_detail_ids[] = $detail->getChangesetDetailId();
                }

                // generate by changeset_id
                if ($forceAnd) {
                    $query->andWhere('r.partId IN (SELECT pl3.partId FROM LundProducts\Entity\ChangesetDetails pl3 where pl3.changesetDetailId IN (' . implode(',', $changeset_detail_ids) . '))');
                } else {
                    $query->where('r.partId IN (SELECT pl3.partId FROM LundProducts\Entity\ChangesetDetails pl3 where pl3.changesetDetailId IN (' . implode(',', $changeset_detail_ids) . '))');
                }
            }
        }

        return $query->getQuery()
                     ->useResultCache(true, 7200, 'parts_find_aces_'.$brand->getName().'_'.$changeset_id)
                     ->getResult();
    }

    /*
     * @return mixed
     */
    public function buildQuery($query)
    {
        $query->select(array('r', 'pl'))
              ->from('LundProducts\Entity\Parts', 'r')
              ->where('r.deleted = false')
              ->where('r.disabled = false')
              ->leftJoin('r.productLine', 'pl');

        return $query;
    }

    /*
     * @return mixed
     */
    public function buildWhere($query = null, $sSearch = null)
    {
        $query->where(
            $query->expr()->orX(
                $query->expr()->like('r.partNumber', '?1'),
                $query->expr()->like('r.partVariant', '?1'),
                $query->expr()->like('r.msrpPrice', '?1'),
                $query->expr()->like('pl.name', '?1')
            )
        )->setParameter(1, '%' . $sSearch . '%');

        return $query;
    }

    /**
     * return total rows in parts table, for datatables JSON pagination primarily
     *
     * @return mixed
     */
    public function getTotalRows($sSearch = null)
    {
        $query = $this->objectManager->createQueryBuilder();
        $query = $this->buildQuery($query);
        $query->add('select', 'COUNT(r.partId)');

        if (null != $sSearch) {
            $query = $this->buildWhere($query, $sSearch);
        }

        return $query->getQuery()
                     ->useResultCache(true, 7200, 'parts_get_total_rows')
                     ->getSingleScalarResult();
    }

    /*
     * Update existing Parts Status
     *
     * @param  PartsInterface            $part
     * @param  ChangesetDetailsInterface $details
     * @param  array                     $rowData
     * @return null|PartsInterface
     */
    public function editStatus(
        PartsInterface            $part,
        ChangesetDetailsInterface $details,
        $rowData = array())
    {
        $part->setModifiedAt(new DateTime('now'))
             ->setModifiedBy('system')
             ->setStatus(trim($rowData[34]));

        $this->objectManager->flush();

        return $part;
    }

    /*
     * Update existing Parts Country
     *
     * @param  PartsInterface            $part
     * @param  ChangesetDetailsInterface $details
     * @param  array                     $rowData
     * @return null|PartsInterface
     */
    public function editCountry(
        PartsInterface            $part,
        ChangesetDetailsInterface $details,
        $rowData = array())
    {
        $part->setModifiedAt(new DateTime('now'))
             ->setModifiedBy('system')
             ->setCountryOfOrigin(trim($rowData[31]));;

        $this->objectManager->flush();

        return $part;
    }

    /*
     * Update existing Parts Pop
     *
     * @param  PartsInterface            $part
     * @param  ChangesetDetailsInterface $details
     * @param  array                     $rowData
     * @return null|PartsInterface
     */
    public function editPop(
        PartsInterface            $part,
        ChangesetDetailsInterface $details,
        $rowData = array())
    {
        $part->setModifiedAt(new DateTime('now'))
             ->setModifiedBy('system')
             ->setPopCode(trim($rowData[17]));;

        $this->objectManager->flush();

        return $part;
    }

    /*
     * Update existing Parts Color
     *
     * @param  PartsInterface            $part
     * @param  ChangesetDetailsInterface $details
     * @param  array                     $rowData
     * @return null|PartsInterface
     */
    public function editColor(
        PartsInterface            $part,
        ChangesetDetailsInterface $details,
        $rowData = array())
    {
        $part->setModifiedAt(new DateTime('now'))
             ->setModifiedBy('system')
             ->setColor(trim($rowData[24]));;

        $this->objectManager->flush();

        return $part;
    }

    /*
     * Update existing Parts Dimensions
     *
     * @param  PartsInterface            $part
     * @param  ChangesetDetailsInterface $details
     * @param  array                     $rowData
     * @return null|PartsInterface
     */
    public function editDimensions(
        PartsInterface            $part,
        ChangesetDetailsInterface $details,
        $rowData = array())
    {
        $part->setModifiedAt(new DateTime('now'))
             ->setModifiedBy('system')
             ->setDima(trim($rowData[38]))
             ->setDimb(trim($rowData[39]))
             ->setDimc(trim($rowData[40]))
             ->setDimd(trim($rowData[41]))
             ->setDime(trim($rowData[42]))
             ->setDimf(trim($rowData[43]))
             ->setDimg(trim($rowData[44]))
             ->setWeight(trim($rowData[19]))
             ->setHeight(trim($rowData[20]))
             ->setWidth(trim($rowData[21]))
             ->setLength(trim($rowData[22]));

        $this->objectManager->flush();

        return $part;
    }

    /*
     * Update existing Parts item class
     *
     * @param  PartsInterface            $part
     * @param  ChangesetDetailsInterface $details
     * @param  ProductLinesInterface     $productLine
     * @param  array                     $rowData
     * @return null|PartsInterface
     */
    public function editClass(
        PartsInterface $part,
        ChangesetDetailsInterface $details,
        ProductLinesInterface $productLine,
        $rowData = array())
    {
        $part->setModifiedAt(new DateTime('now'))
            ->setModifiedBy('system')
            ->setProductLine($productLine);

        $this->objectManager->flush();

        return $part;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                 $id
     * @return PartsInterface|null
     */
    public function find($id)
    {
        return $this->partsRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return PartsInterface[]
     */
    public function findAll()
    {
        return $this->partsRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array            $criteria
     * @param  array|null       $orderBy
     * @param  int|null         $limit
     * @param  int|null         $offset
     * @return PartsInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->partsRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array               $criteria
     * @return PartsInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->partsRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->partsRepository->getClassName();
    }
}
