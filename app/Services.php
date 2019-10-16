<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Services extends Model
{
    //
    public static function getserviceData(){
        $value=DB::table('services')->orderBy('id', 'asc')->get();
        return $value;
      }
}
