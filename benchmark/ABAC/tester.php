<?php

require 'vendor/autoload.php';
use PhpAbac\Abac;
//use PhpAbac\Example\User;
class User{
    protected $id;

    protected $isBanned;

    public function getId() {
        return $this->id;
    }

    public function setIsBanned($isBanned) {
        $this->isBanned = $isBanned;

        return $this;
    }

    public function getIsBanned() {
        return $this->isBanned;
    }
}
$user = new User();

$abac = new Abac([
    'policy_rule_configuration.yml'
]);
$abac->enforce('alcoollaw', $user);
