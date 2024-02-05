<?php

namespace App\Controllers;


use Google\ServiceSheets;




class SiswaController extends BaseController

{

    // mengalihkan route ke halaman login
    public function index()
    {
        if(!session()->get('id')){
            return redirect()->to('/login');
        }

        $service = new ServiceSheets();
        $spreadsheetIdsiswa = '1FmwFDcO8cr7dWOnOJpw3um4Op3SWp9C1c_EeKU8xNHM';
        $rangesiswa = 'datasiswa';
        $responsesiswa = $service->service()->spreadsheets_values->get($spreadsheetIdsiswa, $rangesiswa);
        $valuessiswa = $responsesiswa->getValues();

        $data = [
            'title' => 'Siswa',
            'page' => 'siswa',
            'siswa' => $valuessiswa,
        ];
        return view('pages/siswa' , $data);
    }

}