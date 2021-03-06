<?php

/**
 * This class contains the Resource Class
 *
 * PHP version 5.3+
 * 
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */

namespace Noop;

/**
 * Represents a resource.
 *  
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */
class Resource {

    /**
    * @var string $code code 
    */
    private $code;

    /**
    * @var string $name name
    */
    private $name;
    
    /**
    * @var string $description description
    */
    private $description;

    /**
    * @var array $childResources child resources
    */
    private $childResources = array();

    /**
    * Constructor
    * 
    * @param string $code code
    * @param string $name name
    * @param string $desc description
    *
    */
    public function __construct($code, $name=null, $desc=null)
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $desc;
    }   
    
    /**
    * Add child resource
    *
    * @param mixed $resource child resource
    *
    * @return void
    */
    public function addChildResource($resource)
    {
        $this->childResources[] = $resource;
    }

    /**
    * Get code
    *
    * @return string
    */
    public function getCode()
    {
        return $this->code;
    }
}
