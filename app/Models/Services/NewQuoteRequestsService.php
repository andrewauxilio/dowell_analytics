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

    public function getQLDQuoteRequests($request)
    {
        return $this->NewQuoteRequestsRepository->getQLDQuoteRequests($request);
    }

    public function getQLDTotalQuoteRequests($request)
    {
        return $this->NewQuoteRequestsRepository->getQLDTotalQuoteRequests($request);
    }

    public function getNSWQuoteRequests($request)
    {
        return $this->NewQuoteRequestsRepository->getNSWQuoteRequests($request);
    }

    public function getNSWTotalQuoteRequests($request)
    {
        return $this->NewQuoteRequestsRepository->getNSWTotalQuoteRequests($request);
    }

}