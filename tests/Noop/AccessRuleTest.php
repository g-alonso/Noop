<?php

/**
 * This class contains the AccessRule Test
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
 * Represents an AccessRule Test
 *
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */
class AccessRuleTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Role
     */
    protected $role;

    /**
     * @var Resource
     */
    protected $resource;

    /**
     * @var Action
     */
    protected $action;


    protected function setUp()
    {
        parent::setUp();

        $this->role = new Role("Admin", new Organization("Org1"));
        $this->resource = new Resource("Customer");
        $this->action = new Action("read");


    }

    public function testAccess()
    {
        $accessRule = new AccessRule($this->role,$this->resource,$this->action, true);

        $result = $accessRule->tryAccess("Admin","Org1","Customer", "read");

        $this->assertEquals(true, $result);
    }

    public function testAccessClosure()
    {
        $accessRule = new AccessRule($this->role,$this->resource,$this->action, function(){
            return (date("Y") == 1994);
        });

        $result = $accessRule->tryAccess("Admin","Org1","Customer", "read");

        $this->assertEquals(false, $result);
    }
}
