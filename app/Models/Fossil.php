<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;

class Fossil extends Picture
{
    //
    protected $table = 'fossil';
    public function getList($request)
    {
        return parent::getList($request); // TODO: Change the autogenerated stub
    }
}
