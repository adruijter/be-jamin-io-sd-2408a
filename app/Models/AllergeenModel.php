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

    public function sp_CreateAllergeen($name, $description)
    {
        $row = DB::selectOne('CALL sp_CreateAllergeen(:name, :description)',
        [
            'name' => $name,
            'description' => $description
        ]
        );

        return $row->new_id;
    }

    public function sp_DeleteAllergeen($id)
    {
        $result = DB::selectOne('CALL sp_DeleteAllergeen(:id)', [
            'id' => $id
        ]);

        return $result->affected;
    }
}
