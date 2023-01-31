<?php
namespace App\Controllers;
use Config\Services;
use App\Models\Penduduk_model;

class Penduduk extends BaseController
{
    public function index()
    {
        $data = [
            'location'  => 'penduduk'
        ];
        
        return view('penduduk',$data);
    }

    public function data_penduduk_json()
    {
        $m_penduduk     = new Penduduk_model();
        $rs             = $m_penduduk->data_penduduk_json();
        $data           = array();
        $no             = 1;


        foreach($rs as $r){
            $nik            = $r->nik;
            $no_kk          = $r->no_kk;
            $nama           = $r->nama;
            $tempat_lahir   = $r->tempat_lahir;
            $tanggal_lahir  = $r->tanggal_lahir;
            $jenis_kelamin  = $r->jenis_kelamin;
            $pendidikan     = $r->pendidikan;
            $pendapatan     = $r->pendapatan;
            $agama          = $r->agama;
            $alamat         = $r->alamat;
            $kelurahan      = $r->kelurahan;
            $penduduk_asli  = $r->penduduk_asli;
            $onclick        = "return confirm('Anda Yakin Ingin Menghapus Data Ini ?')";
            $btn            = '<a href="'.base_url().'/penduduk/edit/'.$nik.'" data-toggle="tooltip"
                                data-placement="top" title="" data-original-title="Edit">
                                <i class="far fa-edit fa-lg text-success"></i></a>
                                <a href="'.base_url().'penduduk/delete/'.$nik.'" data-toogle="tooltip"
                                data-placement="top" title="" data-original-title="Delete"
                                onclick="'.$onclick.'"><i class="far fa-trash-alt fa-lg text-danger"></i>
                                </a>';
            $data[] = array(
                $nik,
                $no_kk,
                $nama, 
                $tempat_lahir,
                $tanggal_lahir,
                $jenis_kelamin,
                $pendidikan,
                $pendapatan,
                $agama,
                $alamat,
                $kelurahan,
                $penduduk_asli,
                $btn
            );
            $no++;
        }
        
        $output = array(
                "data"  => $data
            );
        echo json_encode($output);
    }
}

?>