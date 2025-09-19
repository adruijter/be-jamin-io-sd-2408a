<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AllergeenModel extends Model
{
    public function sp_getAllAllergenen()
    {
        return DB::select('CALL SP_GetAllAllergenen');
    }
}
