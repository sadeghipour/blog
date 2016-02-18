<?php
namespace App\Models;
use Phalcon\Mvc\Model\Validator\Email as Email;

class Admin extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $guid;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var integer
     */
    public $is_active;

    /**
     *
     * @var string
     */
    public $last_ip;

    /**
     * Validations and business logic
     */
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'guid' => 'guid', 
            'email' => 'email', 
            'password' => 'password', 
            'is_active' => 'is_active', 
            'last_ip' => 'last_ip'
        );
    }

}
