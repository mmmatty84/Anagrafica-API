<?php

namespace App\DataFixtures;

use App\Enum\Ruolo;
use App\Factory\CittadinoFactory;
use App\Factory\NucleoFamiliareFactory;
use App\Factory\FamigliaFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class NucleoFamiliareFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($j = 0; $j < 50; $j++) {
            $famiglia = FamigliaFactory::random();

            for ($i = 0; $i < mt_rand(1, 5); $i++) {
                NucleoFamiliareFactory::new()->create([
                    'famiglia' => $famiglia,
                    'cittadino' => CittadinoFactory::random(), // Seleziona un cittadino esistente a caso
                    'ruolo' => $faker->randomElement([Ruolo::GENITORE, Ruolo::TUTORE, Ruolo::FIGLIO]),
                ]);
            }
        }
    }

    public function getDependencies()
    {
        return [
            CittadinoFixtures::class,
            FamigliaFixtures::class
        ];
    }
}
