<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Entity
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\Entity;

/**
 * Grades
 *
 * @see GradesInterface
 */
class GradesSubject implements GradesSubjectInterface
{
    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $createdBy;

    /**
     * @var \DateTime
     */
    protected $modifiedAt;

    /**
     * @var string
     */
    protected $modifiedBy;

    /**
     * @var boolean
     */
    protected $disabled;

    /**
     * @var \SmartQuestions\Entity\Grades
     */
    protected $gradeId;

    /**
     * @var \SmartQuestions\Entity\Subjects
     */
    protected $subjectId;

    /**
     * @var integer
     */
    protected $gradeSubjectId;

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Grades
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param  string $createdBy
     * @return Grades
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set modifiedAt
     *
     * @param  \DateTime $modifiedAt
     * @return Grades
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set modifiedBy
     *
     * @param  string $modifiedBy
     * @return Grades
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set disabled
     *
     * @param  boolean $disabled
     * @return Grades
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get disabled
     *
     * @return boolean
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set gradeId
     *
     * @param  \SmartQuestions\Entity\Grades $gradeId
     * @return Grades
     */
    public function setGradeId(\SmartQuestions\Entity\Grades $gradeId = null)
    {
        $this->gradeId = $gradeId;

        return $this;
    }

    /**
     * Get gradeId
     *
     * @return \SmartQuestions\Entity\Grades
     */
    public function getGradeId()
    {
        return $this->gradeId;
    }

    /**
     * Set subjectId
     *
     * @param  \SmartQuestions\Entity\Subjects $subjectId
     * @return Grades
     */
    public function setSubjectId(\SmartQuestions\Entity\Subjects $subjectId = null)
    {
        $this->subjectId = $subjectId;

        return $this;
    }

    /**
     * Get subjectId
     *
     * @return \SmartQuestions\Entity\Subjects
     */
    public function getSubjectId()
    {
        return $this->subjectId;
    }
    
    
    /**
     * Get gradeSubjectId
     *
     * @return integer
     */
    public function getGradeSubjectId()
    {
        return $this->gradeId;
    }

}
