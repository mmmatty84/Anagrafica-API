# **Progetto per la risoluzione dell'esercizio BE#55**

## _Docker configuration_
- PHP-FPM 8.2.16
- Nginx
- MySql 8

Il container che viene generato ha già un database popolato con dei dati di esempio,
viene caricato all'avvio del container utilizzando il file anagrafica.sql consultabile
nella cartella .docker

La struttura del db Anagrafica prevede 4 tabelle
- cittadino (descrive nome, cognome e codice fiscale del cittadino)
- famiglia (descrive il nome della famiglia e l'eventuale cittadino responsabile)
- nucleo_familiare (descrive il nucleo familiare associando il cittadino, la famiglia ed il ruolo del cittadino per quella famiglia)
- doctrine_migration_versions (contiene i file migrations utilizzati con lo sviluppo delle entities e le successive modifiche del db)

## _Symfony_

Il framework utilizzato è Symfony 7.0.4.
I package utilizzati sono quelli minimali della versione skeleton, in più:
- "doctrine/orm" (per gestire il mapping con il db MySql)
- "symfony/serializer" (per la serialization dei Json di risposta)
- "symfony/validator" (per la validazione dei dati nel body della request, in questo caso solo gli ID)

Per la versione dev sono stati utilizzati inoltre:
- "doctrine/doctrine-fixtures-bundle" (per generare le fixtures per la creazione dei dati di test)
- "symfony/maker-bundle" (per il supporto nella creazione di entità, controller, servizi)
- "zenstruck/foundry" (supporto per la generazione delle factory)

La struttura degli endpoint all'interno del FamigliaController prevede per tutti il suffisso /api/ e la risposta in formato JSON.
I quattro endpoint sono stati definiti con le seguenti annotations:
- #[Route('/famiglia/{famiglia}/promuovi', name: 'promuovi', methods:['PATCH'])]

- #[Route('/famiglia/{famiglia}/rimuovi/{cittadino}', name: 'rimuovi', methods:['DELETE'])]

- #[Route('/famiglia/{famigliaOrigine}/sposta/{cittadino}', name: 'sposta', methods:['PATCH'])]

- #[Route('/famiglia/aggiungi/{cittadino}', name: 'aggiungi', methods:['PATCH'])]

Viene allegato il file Anagrafica API.postman_collection.json all'interno della cartella utils con gli schemi e dati di esempio delle 4 richieste alle API