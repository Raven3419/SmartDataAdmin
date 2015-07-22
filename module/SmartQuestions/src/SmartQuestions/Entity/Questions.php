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
 * Questions
 *
 * @see QuestionsInterface
 */
class Questions implements QuestionsInterface
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
     * @var string
     */
    protected $textQuestion;

    /**
     * @var string
     */
    protected $textCorrectAnswer;

    /**
     * @var string
     */
    protected $textOptionOne;

    /**
     * @var string
     */
    protected $textOptionTwo;

    /**
     * @var string
     */
    protected $textOptionThree;

    /**
     * @var string
     */
    protected $youtube;

    /**
     * @var string
     */
    protected $images;

    /**
     * @var string
     */
    protected $paragraph;

    /**
     * @var integer
     */
    protected $isImage;

    /**
     * @var integer
     */
    protected $questionId;

    /**
     * @var integer
     */
    protected $schoolId;

    /**
     * @var \SmartQuestions\Entity\Grades
     */
    protected $gradeId;

    /**
     * @var \SmartQuestions\Entity\Subjects
     */
    protected $subjectId;

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Questions
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
     * @return Questions
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
     * @return Questions
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
     * @return Questions
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
     * @return Questions
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
     * Set textQuestion
     *
     * @param  string $textQuestion
     * @return Questions
     */
    public function setTextQuestion($textQuestion)
    {
        $this->textQuestion = $textQuestion;

        return $this;
    }

    /**
     * Get textQuestion
     *
     * @return string
     */
    public function getTextQuestion()
    {
        return $this->textQuestion;
    }
    
    /**
     * Set textCorrectAnswer
     *
     * @param  string $textCorrectAnswer
     * @return Questions
     */
    public function setTextCorrectAnswer($textCorrectAnswer)
    {
    	$this->textCorrectAnswer = $textCorrectAnswer;
    
    	return $this;
    }
    
    /**
     * Get textCorrectAnswer
     *
     * @return string
     */
    public function getTextCorrectAnswer()
    {
    	return $this->textCorrectAnswer;
    }
    
    /**
     * Set textOptionOne
     *
     * @param  string $textOptionOne
     * @return Questions
     */
    public function setTextOptionOne($textOptionOne)
    {
    	$this->textOptionOne = $textOptionOne;
    
    	return $this;
    }
    
    /**
     * Get textOptionOne
     *
     * @return string
     */
    public function getTextOptionOne()
    {
    	return $this->textOptionOne;
    }
    
    /**
     * Set textOptionTwo
     *
     * @param  string $textOptionTwo
     * @return Questions
     */
    public function setTextOptionTwo($textOptionTwo)
    {
    	$this->textOptionTwo = $textOptionTwo;
    
    	return $this;
    }
    
    /**
     * Get textOptionTwo
     *
     * @return string
     */
    public function getTextOptionTwo()
    {
    	return $this->textOptionTwo;
    }
    
    /**
     * Set textOptionThree
     *
     * @param  string $textOptionThree
     * @return Questions
     */
    public function setTextOptionThree($textOptionThree)
    {
    	$this->textOptionThree = $textOptionThree;
    
    	return $this;
    }
    
    /**
     * Get textOptionThree
     *
     * @return string
     */
    public function getTextOptionThree()
    {
    	return $this->textOptionThree;
    }

    /**
     * Set youtube
     *
     * @param  string $youtube
     * @return Questions
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Set images
     *
     * @param  string $images
     * @return Questions
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }
    
    /**
     * Set paragraph
     *
     * @param  string $paragraph
     * @return Questions
     */
    public function setParagraph($paragraph)
    {
    	$this->paragraph = $paragraph;
    
    	return $this;
    }
    
    /**
     * Get paragraph
     *
     * @return string
     */
    public function getParagraph()
    {
    	return $this->paragraph;
    }
    
    /**
     * Set isImage
     *
     * @param  string $isImage
     * @return Questions
     */
    public function setIsImage($isImage)
    {
    	$this->isImage = $isImage;
    
    	return $this;
    }
    
    /**
     * Get isImage
     *
     * @return string
     */
    public function getIsImage()
    {
    	return $this->isImage;
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
     * Set schoolId
     *
     * @param  integer $schoolId
     * @return Questions
     */
    public function setSchoolId($schoolId)
    {
    	$this->schoolId = $schoolId;
    
    	return $this;
    }
    
    /**
     * Get schoolId
     *
     * @return integer
     */
    public function getSchoolId()
    {
    	return $this->schoolId;
    }
    
    /**
     * Get questionId
     *
     * @return integer
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }

}
