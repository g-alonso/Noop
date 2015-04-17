<?php

/**
 * This class contains the Acl Class
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
 * Describe Acl
 *  
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */
class Acl {

    /**
    * @var array $rules set of rules
    */
    private $rules = array();

    /**
    * Add rule
    *
    * @param Role     $role     role
    * @param Resource $resource resource
    * @param Action   $action   action
    * @param bool     $grant    grant
    *
    * @return void
    */
    public function addAccessRule(Role $role, Resource $resource, Action $action, $grant=false)
    {        
        $this->rules[] = $this->buildAccessRule($role, $resource, $action, $grant);
    } 

    /**
    * Is allowed 
    *
    * @param string $roleCode         role code
    * @param string $organizationCode organization code
    * @param string $resourceCode     resource code
    * @param string $actionCode       action code
    *
    * @return bool
    */
    public function isAllowed($roleCode, $organizationCode, $resourceCode, $actionCode)
    {
        foreach($this->rules as $accessRule) {
            
            if($accessRule->tryAccess($roleCode, $organizationCode, $resourceCode, $actionCode)){
                return true;
            }
              
        }

        return false;
    }

    /**
    * Build Access Rule
    *
    * @param Role     $role     role
    * @param Resource $resource resource
    * @param Action   $action   action
    * @param bool     $grant    grant
    *
    * @return AccessRule    
    */
    private function buildAccessRule(Role $role, Resource $resource, Action $action, $grant)
    {
        return new AccessRule( $role,  $resource,  $action, $grant);
    }
}
