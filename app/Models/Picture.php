<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected function getList() {
        $res = Model::paginate();

        $url = 'https://fly.sailoa.com/storage';
        foreach ($res as $key => $value){
            $val = substr($value->image, 2);
            $res[$key]['image'] = "$url$val";
        }

        return $res;
    }
}
