<?php
namespace App\Models;
class Posts extends \Phalcon\Mvc\Model
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
    public $title;

    /**
     *
     * @var string
     */
    public $body;

    /**
     *
     * @var integer
     */
    public $write_by;

    /**
     *
     * @var integer
     */
    public $edit_by;

    /**
     *
     * @var string
     */
    public $create_date;

    /**
     *
     * @var string
     */
    public $modified_date;

    /**
     *
     * @var integer
     */
    public $visit_count;

    /**
     *
     * @var string
     */
    public $commants;

    /**
     *
     * @var integer
     */
    public $is_active;

    /**
     *
     * @var string
     */
    public $image;

    public $tag;

    public $category;

    public $is_featured;

    public $description;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'guid' => 'guid', 
            'title' => 'title', 
            'body' => 'body', 
            'write_by' => 'write_by', 
            'edit_by' => 'edit_by', 
            'create_date' => 'create_date', 
            'modified_date' => 'modified_date', 
            'visit_count' => 'visit_count', 
            'commants' => 'commants', 
            'is_active' => 'is_active', 
            'image' => 'image',
            'tag'=>'tag',
            "category"=>"category",
            "is_featured"=>"is_featured",
            "description"=>"description"
        );
    }

}
