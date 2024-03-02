<?php

namespace App\Service;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidatorService
{
    public function __construct(private ValidatorInterface $validator)
    {}


    public function validate($id): ConstraintViolationListInterface
    {
        $constraints = new Assert\Collection([
            // Verifica che l'ID sia obbligatorio, numerico, intero e positivo
            'id' => [
                new Assert\NotBlank(),
                new Assert\Type(['type' => 'numeric']),
                new Assert\Positive(),
            ],
        ]);

        // Validazione dell'ID con i vincoli definiti
        return $this->validator->validate(['id' => $id], $constraints);
    }
}
