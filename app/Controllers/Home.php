<?php

namespace App\Controllers;
use Config\Services;
use App\Models\User_model;

class Home extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $data = [
            'session'   => $session
        ];
        return view('login', $data);
    }

    public function login()
    {
        $session    = \Config\Services::session();
        $m_user     = new User_model();
        $username   = $this->request->getPost('username');
        $password   = md5($this->request->getpost('password'));
        $user       = $m_user->login($username,$password);

            //Proses Login
            if($user) {
                $data = [
                    'username' => $username,
                    'lastlogin' => date('Y-m-d h:i:s')
                ];
                $log    = $m_user->log($data);
                $session->set('username', $username);
                //$session->setFlashdata('sukses','Hai' .$user['username'].)

                return redirect()->to(base_url('dashboard'));
            }

            return redirect()->to(base_url('/'));
    }

    public function logout()
    {
        $session    =\Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
