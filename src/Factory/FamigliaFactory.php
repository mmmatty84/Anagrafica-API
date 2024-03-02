<?php

namespace App\Factory;

use App\Entity\Famiglia;
use App\Repository\FamigliaRepository;
use Random\RandomException;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Famiglia>
 *
 * @method        Famiglia|Proxy                     create(array|callable $attributes = [])
 * @method static Famiglia|Proxy                     createOne(array $attributes = [])
 * @method static Famiglia|Proxy                     find(object|array|mixed $criteria)
 * @method static Famiglia|Proxy                     findOrCreate(array $attributes)
 * @method static Famiglia|Proxy                     first(string $sortedField = 'id')
 * @method static Famiglia|Proxy                     last(string $sortedField = 'id')
 * @method static Famiglia|Proxy                     random(array $attributes = [])
 * @method static Famiglia|Proxy                     randomOrCreate(array $attributes = [])
 * @method static FamigliaRepository|RepositoryProxy repository()
 * @method static Famiglia[]|Proxy[]                 all()
 * @method static Famiglia[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Famiglia[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Famiglia[]|Proxy[]                 findBy(array $attributes)
 * @method static Famiglia[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Famiglia[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class FamigliaFactory extends ModelFactory
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
     * @throws RandomException
     */
    protected function getDefaults(): array
    {
        // Decide casualmente se questa famiglia avrà un responsabile
        $assegnaResponsabile = (bool) random_int(0, 1); // Restituisce 0 o 1, convertito in booleano

        $responsabile = null;
        if ($assegnaResponsabile) {
            $cittadiniNonResponsabili = CittadinoFactory::repository()->findNonResponsabili();
            $responsabile = self::faker()->randomElement($cittadiniNonResponsabili);
            $responsabile = $responsabile ? CittadinoFactory::find($responsabile->getId()) : null;
        }

        return [
            'nome' => self::faker()->company,
            'responsabile' => $responsabile,
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Famiglia $famiglia): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Famiglia::class;
    }
}
