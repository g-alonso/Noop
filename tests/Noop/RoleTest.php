<?php

/**
 * This class contains the Role Class Test
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
 * Represents a Role Test
 *
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */
class RoleTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Role
     */
    protected $role;

    protected function setUp()
    {
        parent::setUp();

        $this->role = new Role("a", new Organization("test"), "this is a role");
    }

    public function testGetters()
    {

        $data = $this->role->getCode().$this->role->getOrganization()->getCode();

        $this->assertEquals($data, "atest");
    }
}
