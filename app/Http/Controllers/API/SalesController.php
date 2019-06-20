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
        if (\Gate::allows('isNational')) {
            $data = $this->SalesService->getNATSales($request);
            return $data;
        }
    }

    public function getQLDSales(Request $request)
    {
        if (\Gate::allows('isQLD')) {
            $data = $this->SalesService->getQLDSales($request);
            return $data;
        }
    }

    public function getGBGSales(Request $request)
    {
        if (\Gate::allows('isQLD')) {
            $data = $this->SalesService->getGBGSales($request);
            return $data;
        }
    }

    public function getNSWSales(Request $request)
    {
        if (\Gate::allows('isNSW')) {
            $data = $this->SalesService->getNSWSales($request);
            return $data;
        }
    }

    public function getNEWSales(Request $request)
    {
        if (\Gate::allows('isNSW')) {
            $data = $this->SalesService->getNEWSales($request);
            return $data;
        }
    }

    public function getNOWSales(Request $request)
    {
        if (\Gate::allows('isNSW')) {
            $data = $this->SalesService->getNOWSales($request);
            return $data;
        }
    }

    public function getSMTSales(Request $request)
    {
        if (\Gate::allows('isNSW')) {
            $data = $this->SalesService->getSMTSales($request);
            return $data;
        }
    }

}