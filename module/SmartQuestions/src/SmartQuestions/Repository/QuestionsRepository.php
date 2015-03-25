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

use SmartQuestions\Repository\QuestionsRepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Questions Repository
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Repository
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class QuestionsRepository implements QuestionsRepositoryInterface, ObjectRepository
{
    /**
     * @var ObjectRepository
     */
    protected $questionsRepository;

    /**
     * @param ObjectRepository $questionsRepository
     */
    public function __construct(ObjectRepository $questionsRepository)
    {
        $this->questionsRepository = $questionsRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                  $id
     * @return QuestionsInterface|null
     */
    public function find($id)
    {
        return $this->questionsRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return QuestionsInterface[]
     */
    public function findAll()
    {
        return $this->questionsRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array             $criteria
     * @param  array|null        $orderBy
     * @param  int|null          $limit
     * @param  int|null          $offset
     * @return QuestionsInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->questionsRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                $criteria
     * @return QuestionsInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->questionsRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->questionsRepository->getClassName();
    }
}
