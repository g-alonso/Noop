<?php

/**
 * This class contains the AccessRule Class
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
 * Represents an AccessRule
 *  
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */
class AccessRule {

    /**
    * @var Role $role role
    */
    private $role;

    /**
    * @var Resource $resource resource
    */
    private $resource;
    
    /**
    * @var Action $action action
    */
    private $action;

    /**
    * @var bool $grant grant
    */
    private $grant;

    /**
    * Constructor
    * 
    * @param Role     $role     role
    * @param Resource $resource resource
    * @param Action   $action   action
    * @param bool     $grant    grant
    *
    */
    public function __construct(Role $role, Resource $resource, Action $action, $grant)
    {
        $this->role = $role;
        $this->resource = $resource;
        $this->action = $action;        
        $this->grant = $grant;
    } 

    /**
     * Try Access
     *
     * @param string $roleCode         role code
     * @param string $organizationCode organization code
     * @param string $resourceCode     resource code
     * @param string $actionCode       action code
     *
     * @return bool
     *
    */
    public function tryAccess($roleCode, $organizationCode, $resourceCode, $actionCode)
    {
        if($this->grant instanceof \Closure){
            $grant = $this->grant->__invoke();
        } else {
            $grant = $this->grant;
        }

        if( $roleCode == $this->role->getCode() && 
            $organizationCode == $this->role->getOrganization()->getCode() && 
            $resourceCode == $this->resource->getCode() && 
            $actionCode == $this->action->getCode() && 
            $grant
        ){
            return true;
        }
    }
}
