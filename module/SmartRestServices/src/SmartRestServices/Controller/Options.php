<?php

namespace SmartRestServices\Controller;

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
        'customer-create-success'            => 'You have successfully created a new Customer.',
        'customer-create-error'              => 'There was an error creating a new Customer.',
        'customer-edit-success'              => 'You have successfully edited the Customer.',
        'customer-edit-error'                => 'There was an error editing the Customer.',
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
