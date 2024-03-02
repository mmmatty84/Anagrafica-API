<?php

namespace App\Doctrine\Type;

use App\Enum\Ruolo;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

/*
 *  Il tipo personalizzato RuoloType deve essere in grado di convertire correttamente i valori
 *  tra l'enum Ruolo in PHP e la rappresentazione del campo nel database.
 *
 *  Quando Doctrine legge il valore dal database e lo setta sull'entità, usa il metodo convertToPHPValue,
 *  e quando scrive il valore nel database, usa il metodo convertToDatabaseValue
 */
class RuoloType extends StringType
{
    public const NAME = 'ruolo_enum'; // Nome unico per il tipo

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Ruolo ? $value->value : null;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value !== null ? Ruolo::from($value) : null;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): true
    {
        return true;
    }
}