<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * This source file is part of Commander.
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartAccounts\Repository;

use SmartAccounts\Repository\PlansRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Plans Repository
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class PlansRepository implements PlansRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectRepository
     */
    protected $plansRepository;

    /**
     * @param ObjectRepository $plansRepository
     */
    public function __construct(ObjectRepository $plansRepository)
    {
        $this->plansRepository = $plansRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                  $id
     * @return PlansInterface|null
     */
    public function find($id)
    {
        return $this->plansRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return PlansInterface[]
     */
    public function findAll()
    {
        return $this->plansRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array             $criteria
     * @param  array|null        $orderBy
     * @param  int|null          $limit
     * @param  int|null          $offset
     * @return PlansInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->plansRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                $criteria
     * @return PlansInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->plansRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->plansRepository->getClassName();
    }
}
