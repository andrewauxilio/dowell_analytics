<?php

namespace App\Procedures\Services;

use App\Procedures\Repositories\SalesRepository;

class SalesService
{
    public function __construct(SalesRepository $SalesRepository)
    {
        $this->SalesRepository = $SalesRepository;
    }

    public function getNATSales($request)
    {
        return $this->SalesRepository->getNATSales($request);
    }

    public function getGBGSales($request)
    {
        return $this->SalesRepository->getGBGSales($request);
    }

    public function getNEWSales($request)
    {
        return $this->SalesRepository->getNEWSales($request);
    }

    public function getNOWSales($request)
    {
        return $this->SalesRepository->getNOWSales($request);
    }

    public function getSMTSales($request)
    {
        return $this->SalesRepository->getSMTSales($request);
    }

}