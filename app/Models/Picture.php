<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Picture extends Model
{
    protected function getList(Request $request) {
        $where_array = array();

        if (!empty($request['name']))
            $where_array['name'] = $request['name'];

        if (!empty($request['race']))
            $where_array['race'] = $request['race'];

        $res = Model::where($where_array)->paginate();
        Log::debug('where_array: ' . json_encode($where_array, JSON_UNESCAPED_UNICODE));
        Log::debug('res: ' . json_encode($res, JSON_UNESCAPED_UNICODE));

        $url = 'https://fly.sailoa.com/storage';
        foreach ($res as $key => $value){
            $val = substr($value->image, 2);
            $res[$key]['image'] = "$url$val";
        }

        $where_array['page'] = isset($page)?$request['page']:1;
        $res = $res->appends($where_array);

        return $res;
    }
}
