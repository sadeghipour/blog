<?php
namespace App\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;

class Comments extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $guid;

    /**
     *
     * @var integer
     */
    public $post_id;

    /**
     *
     * @var string
     */
    public $body;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var integer
     */
    public $is_public;

    /**
     *
     * @var string
     */
    public $ip;


    public $avatar;
    public $is_active;
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
            'post_id' => 'post_id', 
            'body' => 'body', 
            'email' => 'email', 
            'is_public' => 'is_public', 
            'ip' => 'ip',
            'avatar'=>'avatar',
            'is_active'=>'is_active'
        );
    }

}
