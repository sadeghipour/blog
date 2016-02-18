<?php
namespace App\Models;
class VisitIp extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $ip;

    /**
     * Independent Column Mapping.
     */

    public $date;
    public $url;
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'ip' => 'ip',
            'date'=>'date',
            'url'=>'url'
        );
    }

}
