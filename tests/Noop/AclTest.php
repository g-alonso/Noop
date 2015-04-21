<?php

/**
 * This class contains the Acl Class Test
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
 * Represents a Acl Test
 *
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */
class AclTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Acl
     */
    protected $acl;

    protected function setUp()
    {
        parent::setUp();

        $this->acl = new Acl();

        $this->acl->addAccessRule(new Role("super", new Organization("org1")), new Resource("product"), new Action("read"), false);
    }

    public function testAccess()
    {
        $result = $this->acl->isAllowed("super", "org1", "product", "read");

        $this->assertEquals($result, false);
    }
}
