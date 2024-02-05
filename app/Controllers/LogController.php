<?php

namespace App\Controllers;


use Google\ServiceSheets;
use Google\Service\Sheets\ValueRange;




class LogController extends BaseController

{

    // mengalihkan route ke halaman login
    public function index()
    {
        if(!session()->get('id')){
            return redirect()->to('/login');
        }

        $service = new ServiceSheets();
        $spreadsheetIdlog = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
        $rangeslog = 'logpoint';
        $responselog = $service->service()->spreadsheets_values->get($spreadsheetIdlog, $rangeslog);
        $valueslog = $responselog->getValues();

        $data = [
            'title' => 'Log Perilaku',
            'page' => 'logperilaku',
            'log' => $valueslog,
        ];
        return view('pages/log' , $data);
    }

    // mengalihkan route ke halaman pelanggaran
    public function pelanggaran()
    {
        if(!session()->get('id')){
            return redirect()->to('/login');
        }

        $service = new ServiceSheets();
        $spreadsheetIdpelanggaran = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
        $rangespelanggaran = 'pelanggaran';
        $responsepelanggaran = $service->service()->spreadsheets_values->get($spreadsheetIdpelanggaran, $rangespelanggaran);
        $valuespelanggaran = $responsepelanggaran->getValues();

        $data = [
            'title' => 'Pelanggaran',
            'page' => 'pelanggaran',
            'pelanggaran' => $valuespelanggaran,
        ];
        return view('pages/pelanggaran' , $data);
    }

    //tamabah pelanggaran
    public function tambahpelanggaran()
    {
        $jenis = $this->request->getVar('jenis');
        $point = $this->request->getVar('point');

        // mengambil id terakhir dari database google sheet
        $service = new ServiceSheets();
        $spreadsheetIdpelanggaran = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
        $rangespelanggaran = 'pelanggaran';
        $responsepelanggaran = $service->service()->spreadsheets_values->get($spreadsheetIdpelanggaran, $rangespelanggaran);
        $valuespelanggaran = $responsepelanggaran->getValues();
        // mengambil data terakhir dari database google sheet
        
        $id = intval($valuespelanggaran[count($valuespelanggaran) - 1][0]);

        if(count ($valuespelanggaran) > 0){
            
            $id = $id + 1;
        }else{
            $id = 1;
        }

        // mengirim data ke google sheet
        $values = [
            [
                $id, $jenis, $point
            ]
        ];
        $body = new ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $insert = $service->service()->spreadsheets_values->append($spreadsheetIdpelanggaran, $rangespelanggaran, $body, $params);
        

        return redirect()->to('/pelanggaran')->with('message', 'Data berhasil ditambahkan');
    }

    // mengalihkan route ke halaman kebaikan
    public function kebaikan()
    {
        if(!session()->get('id')){
            return redirect()->to('/login');
        }

        $service = new ServiceSheets();
        $spreadsheetIdkebaikan = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
        $rangeskebaikan = 'kebaikan';
        $responsekebaikan = $service->service()->spreadsheets_values->get($spreadsheetIdkebaikan, $rangeskebaikan);
        $valueskebaikan = $responsekebaikan->getValues();

        $data = [
            'title' => 'Kebaikan',
            'page' => 'kebaikan',
            'kebaikan' => $valueskebaikan,
        ];
        return view('pages/kebaikan' , $data);
    }

    // tambah kebaikan
    public function tambahkebaikan()
    {
        $jenis = $this->request->getVar('jenis');
        $point = $this->request->getVar('point');

        // mengambil id terakhir dari database google sheet
        $service = new ServiceSheets();
        $spreadsheetIdkebaikan = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
        $rangeskebaikan = 'kebaikan';
        $responsekebaikan = $service->service()->spreadsheets_values->get($spreadsheetIdkebaikan, $rangeskebaikan);
        $valueskebaikan = $responsekebaikan->getValues();
        // mengambil data terakhir dari database google sheet
        
        $id = intval($valueskebaikan[count($valueskebaikan) - 1][0]);

        if(count ($valueskebaikan) > 0){
            
            $id = $id + 1;
        }else{
            $id = 1;
        }

        // mengirim data ke google sheet
        $values = [
            [
                $id, $jenis, $point
            ]
        ];
        $body = new ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $insert = $service->service()->spreadsheets_values->append($spreadsheetIdkebaikan, $rangeskebaikan, $body, $params);
        

        return redirect()->to('/kebaikan')->with('message', 'Data berhasil ditambahkan');
    }

    // tambah log
    public function tambahlog(){
        if(!session()->get('id')){
            return redirect()->to('/login');
        }else{
            $service = new ServiceSheets();
            // mengambil data pelanggaran
            $spreadsheetIdpelanggaran = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
            $rangespelanggaran = 'pelanggaran';
            $responsepelanggaran = $service->service()->spreadsheets_values->get($spreadsheetIdpelanggaran, $rangespelanggaran);
            $valuespelanggaran = $responsepelanggaran->getValues();
            // mengambil data kebaikan
            $spreadsheetIdkebaikan = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
            $rangeskebaikan = 'kebaikan';
            $responsekebaikan = $service->service()->spreadsheets_values->get($spreadsheetIdkebaikan, $rangeskebaikan);
            $valueskebaikan = $responsekebaikan->getValues();

            $data = [
                'title' => 'Tambah Log',
                'page' => 'tambahlog',
                'pelanggaran' => $valuespelanggaran,
                'kebaikan' => $valueskebaikan,
            ];
            return view('pages/logmanagement' , $data);
        }
        
    }

    // tambah log siswa
    public function tambahlogsiswa()
    {
        // var_dump(session('id'));
        // die();
        $idsiswa = $this->request->getVar('idsiswa');
        // check apakah siswa ada di datasiswa

        $service = new ServiceSheets();
        $spreadsheetIdsiswa = '1FmwFDcO8cr7dWOnOJpw3um4Op3SWp9C1c_EeKU8xNHM';
        $rangesiswa = 'datasiswa';
        $responsesiswa = $service->service()->spreadsheets_values->get($spreadsheetIdsiswa, $rangesiswa);
        $valuessiswa = $responsesiswa->getValues();

        $check = false;
        foreach($valuessiswa as $value){
            if($value[0] == $idsiswa){
                $check = true;
                $datasiswa = $value;
            }
        }

        if($check == false){
            return redirect()->to('/tambahlog')->with('message', 'Data gagal ditambahkan');
        }

        $jenis = $this->request->getVar('jenis');
        if($jenis == '1'){
            $jenis = 'Pelanggaran';
            $detail = $this->request->getVar('pelanggaran');
        }else if($jenis == '2'){
            $jenis = 'Kebaikan';
            $detail = $this->request->getVar('kebaikan');
        }
        else{
            return redirect('/logmanagement')->with('message', 'Data gagal ditambahkan! Siswa tidak ditemukan!');
        }

        $idadmin = session('id');
        $date = date('d-m-Y H:i:s');


        // mengambil id paling terakhir di logpoint
        $spreadsheetIdlog = '1Yx0p1XJStQ8RPUHbr3VpoVuAn4zwWM-xckxbrE9BoXU';
        $rangeslog = 'logpoint';
        $responselog = $service->service()->spreadsheets_values->get($spreadsheetIdlog, $rangeslog);
        $valueslog = $responselog->getValues();
        $id = intval($valueslog[count($valueslog) - 1][0]);

        if(count ($valueslog) > 0){
            
            $id = $id + 1;
        }else{
            $id = 1;
        }

      

        // var_dump(intval($datasiswa[6]) - intval(preg_replace("/[^0-9]/","",$detail)));
        // die();


        // update data point siswa di dataseiswa pada kolom point sesuai jenis
        if($jenis == 'Pelanggaran'){
            $datasiswa[6] = intval($datasiswa[6]) - intval(preg_replace("/[^0-9]/","",$detail));
        }else{
            $datasiswa[6] = intval($datasiswa[6]) + intval(preg_replace("/[^0-9]/","",$detail));
        }
        
        $valuesiswa = [
            [
                 $datasiswa[6]
            ]
        ];

        $bodysiswa = new ValueRange([
            'values' => $valuesiswa
        ]);

        $paramssiswa = [
            'valueInputOption' => 'RAW'
        ];

        $idsiswa = $datasiswa[0]+1;
        $rangesiswaid = 'datasiswa!G'.$idsiswa;
        // var_dump($rangesiswaid);
        // die();
        $insertsiswa = $service->service()->spreadsheets_values->update($spreadsheetIdsiswa, $rangesiswaid, $bodysiswa, $paramssiswa);


        // masukkan ke  logpoint
          // mengirim data ke google sheet
          $values = [
            [
                $id,$date, $datasiswa[0], $jenis, $detail, $idadmin
            ]
        ];


        $body = new ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $insert = $service->service()->spreadsheets_values->append($spreadsheetIdlog, $rangeslog, $body, $params);
        
        return redirect()->to('/logperilaku')->with('message', 'Data berhasil ditambahkan');
    }
}