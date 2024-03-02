<?php

namespace App\Factory;

use App\Entity\NucleoFamiliare;
use App\Enum\Ruolo;
use App\Repository\NucleoFamiliareRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<NucleoFamiliare>
 *
 * @method        NucleoFamiliare|Proxy                     create(array|callable $attributes = [])
 * @method static NucleoFamiliare|Proxy                     createOne(array $attributes = [])
 * @method static NucleoFamiliare|Proxy                     find(object|array|mixed $criteria)
 * @method static NucleoFamiliare|Proxy                     findOrCreate(array $attributes)
 * @method static NucleoFamiliare|Proxy                     first(string $sortedField = 'id')
 * @method static NucleoFamiliare|Proxy                     last(string $sortedField = 'id')
 * @method static NucleoFamiliare|Proxy                     random(array $attributes = [])
 * @method static NucleoFamiliare|Proxy                     randomOrCreate(array $attributes = [])
 * @method static NucleoFamiliareRepository|RepositoryProxy repository()
 * @method static NucleoFamiliare[]|Proxy[]                 all()
 * @method static NucleoFamiliare[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static NucleoFamiliare[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static NucleoFamiliare[]|Proxy[]                 findBy(array $attributes)
 * @method static NucleoFamiliare[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static NucleoFamiliare[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class NucleoFamiliareFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        $famiglia = FamigliaFactory::random();

            return [
                'famiglia' => $famiglia,
                'cittadino' => CittadinoFactory::random(),
                'ruolo' => self::faker()->randomElement([Ruolo::GENITORE, Ruolo::TUTORE, Ruolo::FIGLIO]), // Assegna un ruolo casuale
            ];

    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(FamigliaCittadino $famigliaCittadino): void {})
        ;
    }

    protected static function getClass(): string
    {
        return NucleoFamiliare::class;
    }
}
