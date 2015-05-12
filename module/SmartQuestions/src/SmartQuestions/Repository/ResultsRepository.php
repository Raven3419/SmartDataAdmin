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

use SmartQuestions\Repository\ResultsRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Results Repository
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class ResultsRepository implements ResultsRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectRepository
     */
    protected $resultsRepository;

    /**
     * @param ObjectRepository $resultsRepository
     */
    public function __construct(ObjectRepository $resultsRepository)
    {
        $this->resultsRepository = $resultsRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                  $id
     * @return ResultsInterface|null
     */
    public function find($id)
    {
        return $this->resultsRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return ResultsInterface[]
     */
    public function findAll()
    {
        return $this->resultsRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array             $criteria
     * @param  array|null        $orderBy
     * @param  int|null          $limit
     * @param  int|null          $offset
     * @return ResultsInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->resultsRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                $criteria
     * @return ResultsInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->resultsRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->resultsRepository->getClassName();
    }
}
