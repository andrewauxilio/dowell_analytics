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

}