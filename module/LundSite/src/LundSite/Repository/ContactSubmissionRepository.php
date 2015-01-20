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
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundSite\Repository;

use LundSite\Entity\ContactSubmissionInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * ContactSubmission Repository
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Repository
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 */
class ContactSubmissionRepository implements ContactSubmissionRepositoryInterface, ObjectRepository
{
/**
     * @var ObjectRepository
     */
    protected $contactSubmissionRepository;

    /**
     * @param ObjectRepository $contactSubmissionRepository
     */
    public function __construct(ObjectRepository $contactSubmissionRepository)
    {
        $this->contactSubmissionRepository = $contactSubmissionRepository;
    }

    /**
     * find(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::find()
     * @param  int                             $id
     * @return ContactSubmissionInterface|null
     */
    public function find($id)
    {
        return $this->contactSubmissionRepository->find($id);
    }

    /**
     * findAll(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findAll()
     * @return ContactSubmissionInterface[]
     */
    public function findAll()
    {
        return $this->contactSubmissionRepository->findAll();
    }

    /**
     * findBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findBy()
     * @param  array                        $criteria
     * @param  array|null                   $orderBy
     * @param  int|null                     $limit
     * @param  int|null                     $offset
     * @return ContactSubmissionInterface[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->contactSubmissionRepository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * findOneBy(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::findOneBy()
     * @param  array                           $criteria
     * @return ContactSubmissionInterface|null
     */
    public function findOneBy(array $criteria)
    {
        return $this->contactSubmissionRepository->findOneBy($criteria);
    }

    /**
     * getClassName(): defined by ObjectRepository.
     *
     * @see    ObjectRepository::getClassName()
     * @return string
     */
    public function getClassName()
    {
        return $this->contactSubmissionRepository->getClassName();
    }
}
