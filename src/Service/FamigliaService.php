<?php

namespace App\Service;

use App\Entity\Famiglia;
use App\Entity\Cittadino;
use App\Entity\NucleoFamiliare;
use App\Enum\Ruolo;
use App\Repository\CittadinoRepository;
use App\Repository\NucleoFamiliareRepository;
use App\Repository\FamigliaRepository;
use Doctrine\ORM\EntityManagerInterface;

class FamigliaService
{
    public function __construct(
        private readonly EntityManagerInterface    $em,
        private readonly FamigliaRepository        $famigliaRepository,
        private readonly NucleoFamiliareRepository $nucleoFamiliareRepository,
        private readonly CittadinoRepository       $cittadinoRepository
    ) {}

    public function promuovi(Famiglia $famiglia, Cittadino $cittadino): array
    {
        // Verifica che il cittadino faccia già parte della famiglia con un ruolo ammissibile (Genitore o Tutore)
        list($trovato, $ruolo) = $this->verificaFamigliaEruolo($famiglia, $cittadino);

        if (!$trovato) {
            return ['success' => false, 'message' => 'Il cittadino non fa parte della famiglia come genitore o tutore, quindi non può diventare responsabile.'];
        } else if ($ruolo === Ruolo::GENITORE) {

            // Verifica che la famiglia non superi i 6 membri
            if (count($famiglia->getMembri()) > 6) {
                return ['success' => false, 'message' => 'Un genitore può essere responsabile solo di famiglie con massimo 6 membri.'];
            }

            // Verifica che il genitore non sia già responsabile di più di 3 famiglie
            if (count($this->famigliaRepository->findBy(['responsabile' => $cittadino])) >= 3) {
                return ['success' => false, 'message' => 'Un genitore può essere responsabile per non più di 3 famiglie.'];
            }

            // Se il cittadino ha ruolo tutore, non ci sono limiti sul numero di famiglie o membri

        }


        // Imposta il nuovo responsabile, sostituendo il precedente se esiste
        $famiglia->setResponsabile($cittadino);
        $this->em->flush();

        return ['success' => true, 'message' => 'Cittadino promosso a responsabile con successo.'];
    }

    public function rimuovi(Famiglia $famiglia, Cittadino $cittadino): array
    {
        // Verifica che il cittadino faccia parte della famiglia
        $membro = $this->nucleoFamiliareRepository->findOneBy([
            'famiglia' => $famiglia,
            'cittadino' => $cittadino
        ]);

        if (!$membro) {
            return ['success' => false, 'message' => 'Il cittadino non fa parte della famiglia indicata.'];
        }

        // Vincolo 1: Il cittadino responsabile non può lasciare la famiglia
        if ($famiglia->getResponsabile() === $cittadino) {
            return ['success' => false, 'message' => 'Il cittadino responsabile non può lasciare la famiglia.'];
        }

        // Vincolo 2: I cittadini figli non possono lasciare la famiglia se sono gli unici membri
        // e non appartengono già ad altre famiglie
        $membri = $famiglia->getMembri();
        if (count($membri) === 1 && $membri[0]->getRuolo() === Ruolo::FIGLIO && !$this->cittadinoRepository->haAltreFamiglie($cittadino->getId())) {
            return ['success' => false, 'message' => 'I cittadini figli non possono lasciare la famiglia se sono gli unici membri e non appartengono già ad altre famiglie.'];
        }

        // Rimuovi il cittadino dalla famiglia
        $famiglia->removeMembri($membro);
        $this->em->flush();

        return ['success' => true, 'message' => 'Cittadino rimosso dalla famiglia con successo.'];
    }

    public function sposta(Famiglia $famigliaOrigine, Famiglia $famigliaDestinazione, Cittadino $cittadino): array
    {
        // Verifica che il cittadino faccia parte della famiglia
        $membro = $this->nucleoFamiliareRepository->findOneBy([
            'famiglia' => $famigliaOrigine,
            'cittadino' => $cittadino
        ]);

        if (!$membro) {
            return ['success' => false, 'message' => 'Il cittadino non fa parte della famiglia indicata.'];
        }

        // Verifica che il cittadino non sia il responsabile della famiglia di origine
        if ($famigliaOrigine->getResponsabile() === $cittadino) {
            return ['success' => false, 'message' => 'Il cittadino responsabile non può lasciare la famiglia.'];
        }

        // Verifica se il cittadino è l'unico membro figlio della famiglia di origine e non appartiene già ad altre famiglie
        if ($famigliaOrigine->getMembri()->count() === 1 && $famigliaOrigine->getMembri()[0]->getRuolo() === Ruolo::FIGLIO && !$this->cittadinoRepository->haAltreFamiglie($cittadino->getId())) {
            return ['success' => false, 'message' => 'I cittadini figli non possono lasciare la famiglia se sono gli unici membri e non appartengono già ad altre famiglie.'];
        }

        // Se tutti i controlli vanno a buon fine, salva il ruolo del cittadino che ricopriva nella famiglia di origine
        // ed elimina la riga corrispondente all'associazione
        $ruolo = $membro->getRuolo();
        $famigliaOrigine->removeMembri($membro);


        // Aggiungi il cittadino alla famiglia di destinazione
        $nuovoNucleo = new NucleoFamiliare();
        $nuovoNucleo->setCittadino($cittadino);
        $nuovoNucleo->setFamiglia($famigliaDestinazione);

        // Il ruolo è lo stesso che aveva il cittadino nella precedente famiglia
        $nuovoNucleo->setRuolo($ruolo);
        $famigliaDestinazione->addMembri($nuovoNucleo);

        $this->em->persist($nuovoNucleo);
        $this->em->flush();

        return ['success' => true, 'message' => 'Cittadino spostato alla nuova famiglia con successo.'];
    }

    public function aggiungi(Famiglia $famigliaDestinazione, Cittadino $cittadino): array
    {
        // Verifica che il cittadino non faccia parte della famiglia di destinazione
        $membro = $this->nucleoFamiliareRepository->findOneBy([
            'famiglia' => $famigliaDestinazione,
            'cittadino' => $cittadino
        ]);

        if ($membro) {
            return ['success' => false, 'message' => 'Il cittadino è già membro della famiglia di destinazione.'];
        }

        // Crea la nuova associazione FamigliaCittadino
        $nuovoNucleo = new NucleoFamiliare();
        $nuovoNucleo->setFamiglia($famigliaDestinazione);
        $nuovoNucleo->setCittadino($cittadino);

        // Per il nuovo ruolo nella famiglia, non avendone uno di default da specifiche, viene acquisito il ruolo
        // ricoperto in altre famiglie selezionando il primo risultato, altrimenti imposto 'Ruolo::FIGLIO'
        $altreFamiglie = $this->nucleoFamiliareRepository->findBy([
            'cittadino' => $cittadino
        ]);
        $ruolo = Ruolo::FIGLIO;

        if($altreFamiglie) {
            $ruolo = reset($altreFamiglie)->getRuolo();
        }

        $nuovoNucleo->setRuolo($ruolo);

        $this->em->persist($nuovoNucleo);
        $this->em->flush();

        return ['success' => true, 'message' => 'Cittadino aggiunto alla famiglia di destinazione con successo.'];
    }

    /**
     * @param Famiglia $famiglia
     * @param Cittadino $cittadino
     * @return array
     */
    public function verificaFamigliaEruolo(Famiglia $famiglia, Cittadino $cittadino): array
    {
        $trovato = false;
        $ruolo = null;
        foreach ($famiglia->getMembri() as $membro) {
            if ($membro->getCittadino() === $cittadino && in_array($membro->getRuolo(), [Ruolo::GENITORE, Ruolo::TUTORE], true)) {
                $trovato = true;
                $ruolo = $membro->getRuolo();
                break;
            }
        }
        return array($trovato, $ruolo);
    }
}
