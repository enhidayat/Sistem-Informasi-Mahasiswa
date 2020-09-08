<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //$fillable = yg boleh diisi
    //$guarded = yg gak boleh diisi
    
    protected $fillable = ['nama', 'nrp', 'email', 'jurusan'];

}
