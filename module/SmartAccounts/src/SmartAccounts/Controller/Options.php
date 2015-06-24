<?php

namespace SmartAccounts\Controller;

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
        'accounts-create-success'            => 'You have successfully created a new Accounts.',
        'accounts-create-error'              => 'There was an error creating a new Accounts.',
        'accounts-edit-success'              => 'You have successfully edited the Accounts.',
        'accounts-edit-error'                => 'There was an error editing the Accounts.',
        'customer-create-success'            => 'You have successfully created a new Customer.',
        'customer-create-error'              => 'There was an error creating a new Customer.',
        'customer-edit-success'              => 'You have successfully edited the Customer.',
        'customer-edit-error'                => 'There was an error editing the Customer.',
        'plans-create-success'            	 => 'You have successfully created a new Plans.',
        'plans-create-error'              	 => 'There was an error creating a new Plans.',
        'plans-edit-success'              	 => 'You have successfully edited the Plans.',
        'plans-edit-error'               	 => 'There was an error editing the Plans.',
        'emails-create-success'            	 => 'You have successfully created a new Emails.',
        'emails-create-error'              	 => 'There was an error creating a new Emails.',
        'emails-edit-success'              	 => 'You have successfully edited the Emails.',
        'emails-edit-error'               	 => 'There was an error editing the Emails.',
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
