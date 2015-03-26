<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Module
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundSite\Repository;

use LundSite\Entity\AboutHouseholdInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * AboutHousehold Repository
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class AboutHouseholdRepository implements AboutHouseholdRepositoryInterface, ObjectRepository
{
/**
     * @var ObjectRepository
     */
    protected $aboutHouseholdRepository;

    /**
     * @param ObjectRepository $aboutHouseholdRepository
     */
    public function __construct(ObjectRepository $aboutHouseholdRepository)
    {
        $this->aboutHouseholdRepository = $aboutHouseholdRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                          $id
     * @return AboutHouseholdInterface|null
     */
    public function find($id)
    {
        return $this->aboutHouseholdRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return AboutHouseholdInterface[]
     */
    public function findAll()
    {
        return $this->aboutHouseholdRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array                     $criteria
     * @param  array|null                $orderBy
     * @param  int|null                  $limit
     * @param  int|null                  $offset
     * @return AboutHouseholdInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->aboutHouseholdRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                        $criteria
     * @return AboutHouseholdInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->aboutHouseholdRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->aboutHouseholdRepository->getClassName();
    }
}
