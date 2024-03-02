<?php

namespace App\DataFixtures;

use App\Factory\FamigliaFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FamigliaFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        FamigliaFactory::createMany(30);
    }
}
