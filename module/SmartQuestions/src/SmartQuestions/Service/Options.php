<?php

namespace SmartQuestions\Service;

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
        'grade-creation-success' 	=> 'You have successfully created a new grade.',
        'grade-creation-error'   	=> 'There was an error creating a new grade.',
        'grade-edit-success'     	=> 'You have successfully edited the grade.',
        'grade-edit-error'       	=> 'There was an error editing the grade.',
        'grade-delete-success'   	=> 'You have successfully deleted the grade.',
        'subject-creation-success' 	=> 'You have successfully created a new subject.',
        'subject-creation-error'   	=> 'There was an error creating a new subject.',
        'subject-edit-success'     	=> 'You have successfully edited the subject.',
        'subject-edit-error'       	=> 'There was an error editing the subject.',
        'subject-delete-success'   	=> 'You have successfully deleted the subject.',
        'question-creation-success' => 'You have successfully created a new question.',
        'question-creation-error'   => 'There was an error creating a new question.',
        'question-edit-success'     => 'You have successfully edited the question.',
        'question-edit-error'       => 'There was an error editing the question.',
        'question-delete-success'   => 'You have successfully deleted the question.',
        'result-creation-success' 	=> 'You have successfully created a new result.',
        'result-creation-error'   	=> 'There was an error creating a new result.',
        'result-edit-success'     	=> 'You have successfully edited the result.',
        'result-edit-error'       	=> 'There was an error editing the result.',
        'result-delete-success'   	=> 'You have successfully deleted the result.',
        'customer_creation-success' => 'You have successfully created a new question.',
        'customer_creation-error'   => 'There was an error creating a new question.',
        'customer_edit-success'     => 'You have successfully edited the question.',
        'customer_edit-error'       => 'There was an error editing the question.',
        'customer_delete-success'   => 'You have successfully deleted the question.',
        'global-invalid-id'      => 'You have attempted to access an invalid record.',
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
