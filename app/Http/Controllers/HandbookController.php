<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Art;
use App\Models\Bug;
use App\Models\Fish;
use Illuminate\Http\Request;

class HandbookController extends Controller
{
    //
    public function getList(Request $request, $arg) {
        switch ($arg) {
            case 'animal':
                $res = Animal::paginate();
                break;
            case 'fish':
                $res = Fish::paginate();
                break;
            case 'bug':
                $res = Bug::paginate();
                break;
            case 'art':
                $res = Art::getArtsByPages();
                break;
        }
        $url = 'https://fly.sailoa.com/storage';
        foreach ($res as $key => $value){
            $val = substr($value->image, 2);
            $res[$key]['image'] = "$url$val";
        }

        return $res;
    }
}
