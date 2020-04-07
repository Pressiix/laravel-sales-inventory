<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'campaign_name',
        'report_type',
        'advertiser',
        'start',
        'end',
        'item_name',
        'date',
        'ad_server_impression',
        'ad_server_click',
        'ad_server_ctr',
        'update_at'
    ];
    
    protected $connection = 'mysql';
    protected $table = 'campaign';
}
