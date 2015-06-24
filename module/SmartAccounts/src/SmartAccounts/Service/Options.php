<?php

namespace SmartAccounts\Service;

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
        'customer-creation-success' => 'You have successfully created a new customer.',
        'customer-creation-error'   => 'There was an error creating a new customer.',
        'customer-edit-success'     => 'You have successfully edited the customer.',
        'customer-edit-error'       => 'There was an error editing the customer.',
        'customer-delete-success'   => 'You have successfully deleted the customer.',
        'accounts-creation-success' => 'You have successfully created a new accounts.',
        'accounts-creation-error'   => 'There was an error creating a new accounts.',
        'accounts-edit-success'     => 'You have successfully edited the accounts.',
        'accounts-edit-error'       => 'There was an error editing the accounts.',
        'accounts-delete-success'   => 'You have successfully deleted the accounts.',
        'plans-creation-success' 	=> 'You have successfully created a new plans.',
        'plans-creation-error'   	=> 'There was an error creating a new plans.',
        'plans-edit-success'     	=> 'You have successfully edited the plans.',
        'plans-edit-error'       	=> 'There was an error editing the plans.',
        'plans-delete-success'   	=> 'You have successfully deleted the plans.',
        'emails-creation-success' 	=> 'You have successfully created a new emails.',
        'emails-creation-error'   	=> 'There was an error creating a new emails.',
        'emails-edit-success'     	=> 'You have successfully edited the emails.',
        'emails-edit-error'       	=> 'There was an error editing the emails.',
        'emails-delete-success'   	=> 'You have successfully deleted the emails.',
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
