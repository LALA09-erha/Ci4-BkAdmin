<?php

namespace App\Controllers;
use Google\ServiceSheets;

class Home extends BaseController
{
    public function index()
    {
        if(!session()->get('id')){
            return redirect()->to('/login');
        }else{
            $service = new ServiceSheets();
    
            $spreadsheetIdlog = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
            $rangelog = 'logpoint';
            $response = $service->service()->spreadsheets_values->get($spreadsheetIdlog, $rangelog);
            $values = $response->getValues();
            // hitung jumlah data
            $totallog = count($values) - 1;
    
            $spreadsheetIdsiswa = '1FmwFDcO8cr7dWOnOJpw3um4Op3SWp9C1c_EeKU8xNHM';
            $rangesiswa = 'datasiswa';
            $responsesiswa = $service->service()->spreadsheets_values->get($spreadsheetIdsiswa, $rangesiswa);
            $valuessiswa = $responsesiswa->getValues();
            // hitung jumlah data
            $totalsiswa = count($valuessiswa) - 1;
    
    
    
            $data = [
                'title' => 'Dashboard',
                'page' => 'index',
                'totallog' => $totallog,
                'totalsiswa' => $totalsiswa,
            ];
            return view('pages/index' , $data);
        }
    }
}
