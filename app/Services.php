<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App;

class Services extends Model
{
    //
    public static function getserviceData(){
        $value=DB::table('services')->orderBy('id', 'asc')->get();
        return $value;
      }
}
