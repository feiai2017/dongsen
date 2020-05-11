<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    //
    protected $table = 'art';

    public static function getArtsByPages(){
        $res = Model::paginate();

        $url = 'https://fly.sailoa.com/storage';
        foreach ($res as $key => $value){
            $val = substr($value->image, 2);
            $big_image = substr($value->big_image, 2);
            $res[$key]['image'] = "$url$val";
            $res[$key]['big_image'] = "$url$big_image";
        }

        return $res;
    }
}
