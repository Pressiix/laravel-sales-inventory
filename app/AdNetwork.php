<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdNetwork extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'start',
        'end',
        'page_view',
        'advertiser',
        'impression',
        'ecpm',
        'revenue'
    ];
    protected $connection = 'mysql';
    protected $table = 'ad_network';
}
