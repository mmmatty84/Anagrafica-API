<?php

namespace App\Factory;

use App\Entity\Cittadino;
use App\Repository\CittadinoRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Cittadino>
 *
 * @method        Cittadino|Proxy                     create(array|callable $attributes = [])
 * @method static Cittadino|Proxy                     createOne(array $attributes = [])
 * @method static Cittadino|Proxy                     find(object|array|mixed $criteria)
 * @method static Cittadino|Proxy                     findOrCreate(array $attributes)
 * @method static Cittadino|Proxy                     first(string $sortedField = 'id')
 * @method static Cittadino|Proxy                     last(string $sortedField = 'id')
 * @method static Cittadino|Proxy                     random(array $attributes = [])
 * @method static Cittadino|Proxy                     randomOrCreate(array $attributes = [])
 * @method static CittadinoRepository|RepositoryProxy repository()
 * @method static Cittadino[]|Proxy[]                 all()
 * @method static Cittadino[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Cittadino[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Cittadino[]|Proxy[]                 findBy(array $attributes)
 * @method static Cittadino[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Cittadino[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class CittadinoFactory extends ModelFactory
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
        return [
            'codiceFiscale' => self::faker()->regexify('[A-Z]{6}[0-9]{2}[ABCDEHLMPRST][0-9]{2}[A-Z][0-9]{3}[A-Z]'),
            'cognome' => self::faker()->lastName(255),
            'nome' => self::faker()->firstName(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Cittadino $cittadino): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Cittadino::class;
    }
}
