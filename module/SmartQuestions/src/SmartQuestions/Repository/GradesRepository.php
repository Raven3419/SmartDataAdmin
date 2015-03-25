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

use SmartQuestions\Repository\GradesRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Grades Repository
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class GradesRepository implements GradesRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectRepository
     */
    protected $gradesRepository;

    /**
     * @param ObjectRepository $gradesRepository
     */
    public function __construct(ObjectRepository $gradesRepository)
    {
        $this->gradesRepository = $gradesRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                  $id
     * @return GradesInterface|null
     */
    public function find($id)
    {
        return $this->gradesRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return GradesInterface[]
     */
    public function findAll()
    {
        return $this->gradesRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array             $criteria
     * @param  array|null        $orderBy
     * @param  int|null          $limit
     * @param  int|null          $offset
     * @return GradesInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->gradesRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                $criteria
     * @return GradesInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->gradesRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->gradesRepository->getClassName();
    }
}
