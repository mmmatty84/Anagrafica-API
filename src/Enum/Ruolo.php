<?php

namespace App\Enum;

enum Ruolo: string {
    case GENITORE = 'genitore';
    case TUTORE = 'tutore';
    case FIGLIO = 'figlio';
    case RESPONSABILE = 'responsabile';
}
