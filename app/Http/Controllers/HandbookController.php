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
                $res = $fish->getList();
                break;
            case 'bug':
                $bug = new Bug();
                $res = $bug->getList();
                break;
            case 'art':
                $art = new Art();
                $res = $art->getList();
                break;
            case 'fossil':
                $fossil = new Fossil();
                $res = $fossil->getList();
                break;
            case 'furniture':
                $furniture = new Furniture();
                $res = $furniture->getList();
                break;
        }

        return $res;
    }
}
