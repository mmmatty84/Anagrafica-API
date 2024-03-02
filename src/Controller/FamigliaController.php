<?php

namespace App\Controller;

use App\Entity\Cittadino;
use App\Entity\Famiglia;
use App\Repository\CittadinoRepository;
use App\Repository\FamigliaRepository;
use App\Service\FamigliaService;
use App\Service\ValidatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/api", "api_", format: "json")]
class FamigliaController extends AbstractController
{
    public function __construct(private readonly ValidatorService $validator) {}

    /*
     * API per la promozione di un cittadino a responsabile di una famiglia
     * Viene valutata la risposta del servizio FamigliaService->promuovi
     * Nell'url va indicato l'ID della famiglia da gestire, nel body della richiesta va inserito l'ID del cittadino
     * da promuovere eventualmente come responsabile gestendo il body nel JSON come:
     * {
     *   "cittadino": "{id}"
     *  }
     */
    #[Route('/famiglia/{famiglia}/promuovi', name: 'promuovi', methods: ['PATCH'])]
    public function promuoviCittadino(?Famiglia $famiglia, Request $request, FamigliaService $famigliaService, CittadinoRepository $cittadinoRepository): JsonResponse
    {
        $requestBody = json_decode($request->getContent(), true);
        $cittadinoId = $requestBody['cittadino'] ?? null;

        $violations = $this->validator->validate($cittadinoId);

        if (count($violations) > 0) {
            // Gestisci validazione campo cittadino
            return $this->json([
                'success' => false,
                'message' => 'ID del cittadino mancante o non valido.'
            ], Response::HTTP_BAD_REQUEST);
        }

        $cittadino = $cittadinoRepository->find($cittadinoId);

        if (!$famiglia || !$cittadino) {
            // Se la famiglia o il cittadino non sono stati trovati, viene restituito un errore 404
            return $this->json([
                'success' => false,
                'message' => 'Famiglia o cittadino non trovato.'
            ], Response::HTTP_NOT_FOUND);
        }

        $result = $famigliaService->promuovi($famiglia, $cittadino);

        return $this->json($result,
            $result['success'] ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    /*
     * API per la rimozione di un cittadino da una famiglia
     * Viene valutata la risposta del servizio FamigliaService->rimuovi
     * Nell'url va indicato l'ID della famiglia da gestire e l'ID del cittadino da rimuovere dalla famiglia
     */
    #[Route('/famiglia/{famiglia}/rimuovi/{cittadino}', name: 'rimuovi', methods: ['DELETE'])]
    public function rimuoviCittadino(?Famiglia $famiglia, ?Cittadino $cittadino, FamigliaService $famigliaService): JsonResponse
    {
        if (!$famiglia || !$cittadino) {
            return $this->json([
                'success' => false,
                'message' => 'Famiglia o cittadino non trovato.'
            ], Response::HTTP_NOT_FOUND);
        }

        $result = $famigliaService->rimuovi($famiglia, $cittadino);

        return $this->json($result,
            $result['success'] ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    /*
     * API per lo spostamento di un cittadino da una famiglia a un'altra
     * Viene valutata la risposta del servizio FamigliaService->spostaCittadino
     * Nell'url va indicato l'ID della famiglia di origine (perché il cittadino potrebbe essere associato a più famiglie)
     * e l'ID del cittadino, nel body della richiesta va inserito l'ID della famiglia di destinazione
     * gestendo il body nel JSON come:
     * {
     *    "famiglia": "{id}"
     *  }
     */
    #[Route('/famiglia/{famigliaOrigine}/sposta/{cittadino}', name: 'sposta', methods: ['PATCH'])]
    public function spostaCittadino(?Famiglia $famigliaOrigine, ?Cittadino $cittadino, FamigliaService $famigliaService, Request $request, FamigliaRepository $famigliaRepository): JsonResponse
    {
        $requestBody = json_decode($request->getContent(), true);
        $famigliaId = $requestBody['famiglia'] ?? null;

        $violations = $this->validator->validate($famigliaId);

        if (count($violations) > 0) {
            // Gestisci validazione campo cittadino
            return $this->json([
                'success' => false,
                'message' => 'ID della famiglia di destinazione mancante o non valido.'
            ], Response::HTTP_BAD_REQUEST);
        }

        $famigliaDestinazione = $famigliaRepository->find($famigliaId);

        if (!$famigliaOrigine || !$cittadino || !$famigliaDestinazione) {
            return $this->json([
                'success' => false,
                'message' => 'Famiglia di origine, famiglia di destinazione o cittadino non trovato.'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($famigliaOrigine === $famigliaDestinazione) {
            return $this->json([
                'success' => false,
                'message' => 'Le famiglia di origine e destinazione sono uguali.'
            ], Response::HTTP_NOT_FOUND);
        }

        $result = $famigliaService->sposta($famigliaOrigine, $famigliaDestinazione, $cittadino);

        return $this->json($result,
            $result['success'] ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    /*
     * API per l'aggiunta di un cittadino a una famiglia
     * Viene valutata la risposta del servizio FamigliaService->aggiungi
     * Nell'url va indicato l'ID del cittadino, nel body della richiesta va inserito l'ID della famiglia di destinazione
     * gestendo il body nel JSON come:
     * {
     *    "famiglia": "{id}"
     *  }
     */
    #[Route('/famiglia/aggiungi/{cittadino}', name: 'aggiungi', methods: ['PATCH'])]
    public function aggiungiCittadino(?Cittadino $cittadino, FamigliaService $famigliaService, Request $request, FamigliaRepository $famigliaRepository): JsonResponse
    {
        $requestBody = json_decode($request->getContent(), true);
        $famigliaId = $requestBody['famiglia'] ?? null;

        $violations = $this->validator->validate($famigliaId);

        if (count($violations) > 0) {
            // Gestisci validazione campo cittadino
            return $this->json([
                'success' => false,
                'message' => 'ID della famiglia di destinazione mancante o non valido.'
            ], Response::HTTP_BAD_REQUEST);
        }

        $famigliaDestinazione = $famigliaRepository->find($famigliaId);

        if (!$cittadino || !$famigliaDestinazione) {
            return $this->json([
                'success' => false,
                'message' => 'Famiglia di destinazione o cittadino non trovato.'
            ], Response::HTTP_NOT_FOUND);
        }

        $result = $famigliaService->aggiungi($famigliaDestinazione, $cittadino);

        return $this->json($result,
            $result['success'] ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

}
