<?php

/**
 * This class contains the Role Class
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
 * Represents a Role
 *  
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */
class Role {

    /**
    * @var string $name name of resource
    */
    private $code;

    /**
    * @var Organization $organization related organization    
    */
    private $organization;
    
    /**
    * @var string $description description of resource
    */
    private $description;

    /**
    * Constructor
    * 
    * @param string $code        code
    * @param string $description description    
    *
    */
    public function __construct($code, Organization $organization, $desc=null)
    {
        $this->code = $code;
        $this->organization = $organization;
        $this->description = $desc;
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

    /**
    * Get organization
    *
    * @return Organization
    */
    public function getOrganization()
    {
        return $this->organization;
    }
}
