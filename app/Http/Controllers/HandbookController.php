<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Art;
use App\Models\Bug;
use App\Models\Fish;
use App\Models\Fossil;
use App\Models\Furniture;
use Illuminate\Http\Request;

class HandbookController extends Controller
{
    //
    public function getList(Request $request, $arg) {
        switch ($arg) {
            case 'animal':
                $animal = new Animal();
                $res = $animal->getList($request);
                break;
            case 'fish':
                $fish = new Fish();
                $res = $fish->getList($request);
                break;
            case 'bug':
                $bug = new Bug();
                $res = $bug->getList($request);
                break;
            case 'art':
                $art = new Art();
                $res = $art->getList($request);
                break;
            case 'fossil':
                $fossil = new Fossil();
                $res = $fossil->getList($request);
                break;
            case 'furniture':
                $furniture = new Furniture();
                $res = $furniture->getList($request);
                break;
        }

        return $res;
    }
}
