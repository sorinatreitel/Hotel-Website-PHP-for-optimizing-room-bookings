<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller {


    public static function get_data($id) {
        $data = DB::select("SELECT * FROM " . "TypeRoom" . " WHERE id_RoomType = " . $id);
        return $data;
    }
}