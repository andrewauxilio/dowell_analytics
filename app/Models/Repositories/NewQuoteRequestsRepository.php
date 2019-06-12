<?php

namespace App\Models\Repositories;

use DB;

class NewQuoteRequestsRepository
{

    public function getNATQuoteRequests($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_QuoteRequests ?,?;", array("NAT", 1));
        return $data;
    }

    public function getNATTotalQuoteRequests($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_QuoteRequests ?,?;", array("NAT", 0));
        return $data;
    }

    public function getQLDQuoteRequests($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_QuoteRequests ?,?;", array("QLD", 1));
        return $data;
    }

    public function getQLDTotalQuoteRequests($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_QuoteRequests ?,?;", array("QLD", 0));
        return $data;
    }

    public function getNSWQuoteRequests($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_QuoteRequests ?,?;", array("NSW", 1));
        return $data;
    }

    public function getNSWTotalQuoteRequests($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_QuoteRequests ?,?;", array("NSW", 0));
        return $data;
    }

}