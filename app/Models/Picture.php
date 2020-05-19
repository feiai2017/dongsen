<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Picture extends Model
{
    protected function getList(Request $request)
    {
        $where_array = [];

        $res = Model::when(!empty($request['name']), function ($q) use ($request) {
            $where_array['name'] = $request['name'];
            return $q->where('name', 'like', $request['name'] . '%');
        })->when(!empty($request['race']), function ($q) use ($request) {
            $where_array['race'] = $request['race'];
            return $q->where('race', $request['race']);
        })->when(!empty($request['character']), function ($q) use ($request) {
            return $q->where('character', $request['character']);
        })->when(!empty($request['month']), function ($q) use ($request) {
            $month_type = $request['month_type'] == 1 ? 'south_month' : 'north_month';
            return $q->whereRaw("FIND_IN_SET(?, $month_type)", [$request['month']]);
        })->paginate();

        $url = 'https://fly.sailoa.com/storage';
        foreach ($res as $key => $value) {
            $val                = substr($value->image, 2);
            $res[$key]['image'] = "$url$val";
        }

        $where_array['page'] = isset($page) ? $request['page'] : 1;
        $res                 = $res->appends($where_array);

        return $res;
    }
}
