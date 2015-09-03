<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * This source file is part of Commander.
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Repository;

use SmartQuestions\Repository\CustomersRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Customers Repository
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class CustomersRepository implements CustomersRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectRepository
     */
    protected $customersRepository;

    /**
     * @param ObjectRepository $customersRepository
     */
    public function __construct(ObjectRepository $customersRepository)
    {
        $this->customersRepository = $customersRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                  $id
     * @return CustomersInterface|null
     */
    public function find($id)
    {
        return $this->customersRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return CustomersInterface[]
     */
    public function findAll()
    {
        return $this->customersRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array             $criteria
     * @param  array|null        $orderBy
     * @param  int|null          $limit
     * @param  int|null          $offset
     * @return CustomersInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->customersRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                $criteria
     * @return CustomersInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->customersRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->customersRepository->getClassName();
    }
}
