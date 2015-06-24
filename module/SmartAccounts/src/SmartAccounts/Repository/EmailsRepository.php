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

use SmartAccounts\Repository\EmailsRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Emails Repository
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class EmailsRepository implements EmailsRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectRepository
     */
    protected $emailsRepository;

    /**
     * @param ObjectRepository $emailsRepository
     */
    public function __construct(ObjectRepository $emailsRepository)
    {
        $this->emailsRepository = $emailsRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                  $id
     * @return EmailsInterface|null
     */
    public function find($id)
    {
        return $this->emailsRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return EmailsInterface[]
     */
    public function findAll()
    {
        return $this->emailsRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array             $criteria
     * @param  array|null        $orderBy
     * @param  int|null          $limit
     * @param  int|null          $offset
     * @return EmailsInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->emailsRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                $criteria
     * @return EmailsInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->emailsRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->emailsRepository->getClassName();
    }
}
