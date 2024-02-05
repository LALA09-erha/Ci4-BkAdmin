<?php

namespace App\Controllers;


use Google\ServiceSheets;




class UsersController extends BaseController

{

    // mengalihkan route ke halaman login
    public function index()
    {
        if(!session()->get('id')){
            return redirect()->to('/login');
        }else{
            $service = new ServiceSheets();
            $spreadsheetIdusers = '16iXiHIWgpdlVbXDaeWleWzeaZUeBFlET8VhB2S0gA20';
            $rangeusers = 'datauser';
            $responseusers = $service->service()->spreadsheets_values->get($spreadsheetIdusers, $rangeusers);
            $valuesusers = $responseusers->getValues();
    
            $data = [
                'title' => 'Users',
                'page' => 'users',
                'users' => $valuesusers,
            ];
            return view('pages/users' , $data);

        }

    }

}