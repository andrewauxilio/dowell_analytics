<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Services\NewQuoteRequestsService;
use Illuminate\Http\Request;

class NewQuoteRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $NewQuoteRequestsService;

    public function __construct(NewQuoteRequestsService $NewQuoteRequestsService)
    {
        $this->NewQuoteRequestsService = $NewQuoteRequestsService;
        $this->middleware('auth:api');
    }

    public function getNATQuoteRequests(Request $request)
    {
        $data = $this->NewQuoteRequestsService->getNATQuoteRequests($request);
        return $data;
    }
    public function getNATTotalQuoteRequests(Request $request)
    {
        $data = $this->NewQuoteRequestsService->getNATTotalQuoteRequests($request);
        return $data;
    }

    public function getQLDQuoteRequests(Request $request)
    {
        $data = $this->NewQuoteRequestsService->getQLDQuoteRequests($request);
        return $data;
    }
    public function getQLDTotalQuoteRequests(Request $request)
    {
        $data = $this->NewQuoteRequestsService->getQLDTotalQuoteRequests($request);
        return $data;
    }

    public function getNSWQuoteRequests(Request $request)
    {
        $data = $this->NewQuoteRequestsService->getNSWQuoteRequests($request);
        return $data;
    }
    public function getNSWTotalQuoteRequests(Request $request)
    {
        $data = $this->NewQuoteRequestsService->getNSWTotalQuoteRequests($request);
        return $data;
    }

}