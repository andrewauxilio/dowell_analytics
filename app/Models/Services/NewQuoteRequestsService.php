<?php

namespace App\Models\Services;

use App\Models\Repositories\NewQuoteRequestsRepository;

class NewQuoteRequestsService
{
    public function __construct(NewQuoteRequestsRepository $NewQuoteRequestsRepository)
    {
        $this->NewQuoteRequestsRepository = $NewQuoteRequestsRepository;
    }

    public function getNATQuoteRequests($request)
    {
        return $this->NewQuoteRequestsRepository->getNATQuoteRequests($request);
    }

    public function getNATTotalQuoteRequests($request)
    {
        return $this->NewQuoteRequestsRepository->getNATTotalQuoteRequests($request);
    }

}