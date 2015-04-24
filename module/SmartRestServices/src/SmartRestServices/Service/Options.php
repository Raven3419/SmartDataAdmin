<?php

namespace SmartRestServices\Service;

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
