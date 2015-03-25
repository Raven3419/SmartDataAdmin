<?php

namespace SmartQuestions\Controller;

use Zend\Stdlib\AbstractOptions;

class Options extends AbstractOptions
{
    public function __construct(array $options= null)
    {
        parent::__construct($options);
    }

    /**
     * @var array
     */
    protected $messages = array(
        'grade-create-success'            => 'You have successfully created a new grade.',
        'grade-create-error'              => 'There was an error creating a new grade.',
        'grade-edit-success'              => 'You have successfully edited the grade.',
        'grade-edit-error'                => 'There was an error editing the grade.',
        'question-create-success'            => 'You have successfully created a new question.',
        'question-create-error'              => 'There was an error creating a new question.',
        'question-edit-success'              => 'You have successfully edited the question.',
        'question-edit-error'                => 'There was an error editing the question.',
        'subject-create-success'            => 'You have successfully created a new subject.',
        'subject-create-error'              => 'There was an error creating a new subject.',
        'subject-edit-success'              => 'You have successfully edited the subject.',
        'subject-edit-error'                => 'There was an error editing the subject.',
    );

    /**
    * @param array $messages
    */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
    * @return array
    */
    public function getMessages()
    {
        return $this->messages;
    }
}
