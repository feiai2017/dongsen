<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;

class Furniture extends Picture
{
    //
    protected $table = 'furniture';
    public function getList()
    {
        return parent::getList(); // TODO: Change the autogenerated stub
    }
}
