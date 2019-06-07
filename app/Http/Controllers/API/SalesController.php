<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Services\SalesService;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $SalesService;

    public function __construct(SalesService $SalesService)
    {
        $this->SalesService = $SalesService;
        $this->middleware('auth:api');
    }

    public function getNATSales(Request $request)
    {
        $data = $this->SalesService->getNATSales($request);
        return $data;
    }

    public function getGBGSales(Request $request)
    {
        $data = $this->SalesService->getGBGSales($request);
        return $data;
    }

    public function getNEWSales(Request $request)
    {
        $data = $this->SalesService->getNEWSales($request);
        return $data;
    }

    public function getNOWSales(Request $request)
    {
        $data = $this->SalesService->getNOWSales($request);
        return $data;
    }

    public function getSMTSales(Request $request)
    {
        $data = $this->SalesService->getSMTSales($request);
        return $data;
    }

}