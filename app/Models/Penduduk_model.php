<?php

namespace App\Models;

use CodeIgniter\Model;

class Penduduk_model extends Model
{
    protected $table        ='tab_penduduk';

    public function data_penduduk_json(){
        $query  =   $this->db->query("");
        return $query->getResult();
    }

}

?>