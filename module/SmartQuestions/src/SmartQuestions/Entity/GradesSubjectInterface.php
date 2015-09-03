<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions\Entity
 * @subpackage Interface
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\Entity;

/**
 * Grades interface
 */
interface GradesSubjectInterface
{
    /**
     * @param  \DateTime $createdAt
     * @return Grades
     */
    public function setCreatedAt($createdAt);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param  string $createdBy
     * @return Grades
     */
    public function setCreatedBy($createdBy);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param  \DateTime $modifiedAt
     * @return Grades
     */
    public function setModifiedAt($modifiedAt);

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param  string $modifiedBy
     * @return Grades
     */
    public function setModifiedBy($modifiedBy);

    /**
     * @return string
     */
    public function getModifiedBy();

    /**
     * @param  boolean $disabled
     * @return Grades
     */
    public function setDisabled($disabled);

    /**
     * @return boolean
     */
    public function getDisabled();

    /**
     * @param  \SmartQuestions\Entity\Grades $gradeId
     * @return Grades
     */
    public function setGradeId(\SmartQuestions\Entity\Grades $gradeId = null);

    /**
     * @return \SmartQuestions\Entity\Grades
     */
    public function getGradeId();

    /**
     * @param  \SmartQuestions\Entity\Subjects $subjectId
     * @return Subjects
     */
    public function setSubjectId(\SmartQuestions\Entity\Subjects $subjectId = null);

    /**
     * @return \SmartQuestions\Entity\Subjects
     */
    public function getSubjectId();

    /**
     * @return integer
     */
    public function getGradeSubjectId();

}
