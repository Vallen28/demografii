<?php

namespace App\Controllers;
use Config\Services;

class dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'location'  => 'dashboard'
        ];
        
        return view('dashboard',$data);
    }
}

?>