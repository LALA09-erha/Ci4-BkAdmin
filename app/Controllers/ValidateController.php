<?php

namespace App\Controllers;


use Google\ServiceSheets;




class ValidateController extends BaseController

{

    // mengalihkan route ke halaman login
    public function index()
    {
        if (session()->get('id')) {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Login',
        ];

        return view('login/login', $data);
    }

    // memproses form login dan redirect to view index
    public function proseslogin()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // with google sheet api get data from google sheet
        
        $service = new ServiceSheets();
        $spreadsheetId = '16iXiHIWgpdlVbXDaeWleWzeaZUeBFlET8VhB2S0gA20';
        $range = 'datauser';
        $response = $service->service()->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();
        
        $data = [];
        $check = false;
        // check email and password
        if (!empty($values)) {
            foreach ($values as $row) {
                
                if ($row[3] == $email && $row[2] == $password) {
                    $data = [
                        'id' => $row[0],
                        'username' => $row[1],
                        'email' => $row[3],
                        'role' => $row[4],
                    ];
                    session()->set($data);
                    $check = true;
                }
            }

            if ($check) {
                session()->setFlashdata('message', 'Login Success');
                return redirect()->to('/');
            } else {
                session()->setFlashdata('message', 'Login Failed');
                return redirect()->to('/login');
            }
        }
    }

    // logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

}