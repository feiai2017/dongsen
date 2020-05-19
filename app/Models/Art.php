<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Art extends Model
{
    protected $table = 'art';

    public function getList()
    {
        $res = Model::paginate();

        $url = 'https://fly.sailoa.com/storage';
        foreach ($res as $key => $value) {
            $val                = substr($value->image, 2);
            $res[$key]['image'] = "$url$val";
            $big_image          = json_decode($value->big_image, true);
            if (is_array($big_image)) {
                foreach ($big_image as $k => $v) {
                    $tmp           = substr($v, 2);
                    $big_image[$k] = "$url$tmp";
                }
            }
            $res[$key]['big_image'] = $big_image;
        }
        return $res;
    }

    public function storage_url($url)
    {
        $url = substr($url, 3);
        return $url ? "https://fly.sailoa.com" . Storage::url($url) : '';
    }


    
    public function getUrls()
    {
        $big_images          = json_decode($this->big_image, true);
        if (is_array($big_images)) {
            foreach ($big_images as $big_image) {
                $url[] = "https://fly.sailoa.com" . Storage::url(substr($big_image, 3));
            }
            return $url;
        }
    }
}
