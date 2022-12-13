<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_m_client extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function project()
    {

        //untuk data one to one
        return $this->belongsTo(tb_m_project::class) ;
    }
}