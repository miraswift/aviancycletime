<?php

namespace App\Controllers;

class ReportCycletime extends BaseController
{
    public function index()
    {
        $data['title'] = 'Cycle Time';
        $data['menuGroup'] = 'ReportProduksi';
        $data['menu'] = 'ReportCycletime';

        return view('Dashboard/Index', $data);
    }
}
