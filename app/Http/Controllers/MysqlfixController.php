<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Fish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MysqlfixController extends Controller
{
    //
    public function fix() {
        $fish = Fish::all();
        foreach ($fish as $key => $value) {
            $fish[$key]->south_month = str_replace('、', ',', $value['south_month']);
            $fish[$key]->north_month = str_replace('、', ',', $value['north_month']);
            $fish[$key]->save();
        }

        $bug = Bug::all();
        foreach ($bug as $key => $value) {
            $bug[$key]->south_month = str_replace('、', ',', $value['south_month']);
            $bug[$key]->north_month = str_replace('、', ',', $value['north_month']);
            $bug[$key]->save();

        }
    }
}
