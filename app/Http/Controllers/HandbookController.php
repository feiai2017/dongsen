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
    public function getList($arg) {
        switch ($arg) {
            case 'animal':
                $animal = new Animal();
                $res = $animal->getList();
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
        }

        return $res;
    }
}
