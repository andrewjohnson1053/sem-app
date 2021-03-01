<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'postal_code',
        'start_time',
        'end_time'
    ];

    public static function Create(array $data, array $coordinators){
        $id = DB::table('tournaments')
        ->insertGetId($data);
        foreach ($coordinators as $coordinator) {
            DB::table('tournament_admin')
            ->insert(array('tournament_id' => $id, 'admin_id' => $coordinator->id));
        }
    }

    public static function getTournaments(){
        $retval = array();
        $tournaments = DB::table('tournaments')->limit(20)->get();
        foreach($tournaments as $tournament){
            $adminKey = array();
            $sports = array();
            $admins = DB::table('tournament_admin')->where([
                ['tournament_id','=',$tournament->id]
            ])->get();
            foreach ($admins as $admin) {
                $adminKey.array_push($admin->admin_id);
            }
        }
    }

}
