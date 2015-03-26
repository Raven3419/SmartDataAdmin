<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * This source file is part of Commander.
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Repository;

use LundProducts\Repository\ProductLineAssetRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Part Asset Repository
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class ProductLineAssetRepository implements ProductLineAssetRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectRepository
     */
    protected $productLineAssetRepository;

    /**
     * @param ObjectRepository $productLineAssetRepository
     */
    public function __construct(ObjectRepository $productLineAssetRepository)
    {
        $this->productLineAssetRepository = $productLineAssetRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                            $id
     * @return ProductLineAssetInterface|null
     */
    public function find($id)
    {
        return $this->productLineAssetRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return ProductLineAssetInterface[]
     */
    public function findAll()
    {
        return $this->productLineAssetRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array                       $criteria
     * @param  array|null                  $orderBy
     * @param  int|null                    $limit
     * @param  int|null                    $offset
     * @return ProductLineAssetInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->productLineAssetRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                          $criteria
     * @return ProductLineAssetInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->productLineAssetRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->productLineAssetRepository->getClassName();
    }
}
