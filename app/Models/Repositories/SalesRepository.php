<?php

namespace App\Models\Repositories;

use DB;

class SalesRepository
{

    public function getNATSales($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_SalesFortnight ?,?;", array("NAT", 32));
        return $data;
    }

    public function getQLDSales($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_SalesFortnight ?,?;", array("QLD", 15));
        return $data;
    }

    public function getGBGSales($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_SalesFortnight ?,?;", array("GBG", 15));
        return $data;
    }

    public function getNSWSales($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_SalesFortnight ?,?;", array("NSW", 15));
        return $data;
    }

    public function getNEWSales($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_SalesFortnight ?,?;", array("NEW", 15));
        return $data;
    }

    public function getNOWSales($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_SalesFortnight ?,?;", array("NOW", 15));
        return $data;
    }

    public function getSMTSales($request)
    {
        $data = DB::select("SET NOCOUNT ON; exec P_Sales_DB_SalesFortnight ?,?;", array("SMT", 15));
        return $data;
    }
}