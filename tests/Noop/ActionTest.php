<?php

/**
 * This class contains the Action Class Test
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
 * Represents a Action Test
 *
 * @package    Noop
 * @author     Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright  2015 Galonso
 * @license    WTFPL - http://www.wtfpl.net/txt/copying/
 * @link       https://github.com/g-alonso/Noop
 *
 */
class ActionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Action
     */
    protected $action;

    protected function setUp()
    {
        parent::setUp();

        $this->action = new Action("a", "b");
    }

    public function testGetters()
    {

        $data = $this->action->getCode();

        $this->assertEquals($data, "a");
    }
}
