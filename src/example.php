<?php

require "Noop/Acl.php";
require "Noop/Organization.php";
require "Noop/Resource.php";
require "Noop/Role.php";
require "Noop/Action.php";
require "Noop/AccessRule.php";

use Noop\Resource;
use Noop\Role;
use Noop\Organization;
use Noop\Acl;
use Noop\Action;

$acl = new Acl();

$acmeManager = new Role("Manager", new Organization("Acme"));
$bazManager  = new Role("Manager", new Organization("Baz"));

$customerResource = new Resource("Customer");
$productResource  = new Resource("Product");

// Acme
$acl->addAccessRule($acmeManager, $customerResource, new Action("read"), true);
$acl->addAccessRule($acmeManager, $customerResource, new Action("create"), true);
$acl->addAccessRule($acmeManager, $customerResource, new Action("update"), true);
$acl->addAccessRule($acmeManager, $customerResource, new Action("delete"), true);

$acl->addAccessRule($acmeManager, $productResource, new Action("read"), true);
$acl->addAccessRule($acmeManager, $productResource, new Action("create"), true);
$acl->addAccessRule($acmeManager, $productResource, new Action("update"), true);
$acl->addAccessRule($acmeManager, $productResource, new Action("delete"), true);

// Baz
$acl->addAccessRule($bazManager, $customerResource, new Action("read"), true);

$acl->addAccessRule($bazManager, $productResource, new Action("create"), function(){
    //only this day
    return (date("d") == 17);
});

// Check access
$access = $acl->isAllowed("Manager", "Baz", "Product", "create");

if ($access){
    echo "Access granted!";
} else {
    echo "Access denied!";
}
