<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DataController extends Controller
{
    public function getListaDisciplinas() {

        $columns = Schema::getColumnListing('disciplinas');
        $disciplinasNoId = array_diff($columns, ['user_id', 'id']);
        return response()->json(['disciplinas' => $disciplinasNoId]);

    }
}
