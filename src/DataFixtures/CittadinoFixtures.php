<?php

namespace App\DataFixtures;

use App\Factory\CittadinoFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CittadinoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CittadinoFactory::createMany(50);
    }
}
