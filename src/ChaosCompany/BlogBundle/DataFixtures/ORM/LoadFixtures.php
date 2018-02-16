<?php
namespace ChaosCompany\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements ORMFixtureInterface {

    public function load(ObjectManager $manager)
    {
        Fixtures::load(__DIR__.'/fixtures.yml', $manager);
    }
}