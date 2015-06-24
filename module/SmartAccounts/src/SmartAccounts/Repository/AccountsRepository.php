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

use SmartAccounts\Repository\AccountsRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Accounts Repository
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class AccountsRepository implements AccountsRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectRepository
     */
    protected $accountsRepository;

    /**
     * @param ObjectRepository $accountsRepository
     */
    public function __construct(ObjectRepository $accountsRepository)
    {
        $this->accountsRepository = $accountsRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                  $id
     * @return AccountsInterface|null
     */
    public function find($id)
    {
        return $this->accountsRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return AccountsInterface[]
     */
    public function findAll()
    {
        return $this->accountsRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array             $criteria
     * @param  array|null        $orderBy
     * @param  int|null          $limit
     * @param  int|null          $offset
     * @return AccountsInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->accountsRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                $criteria
     * @return AccountsInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->accountsRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->accountsRepository->getClassName();
    }
}
