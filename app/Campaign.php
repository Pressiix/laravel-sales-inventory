<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'request_id',
        'sales_name',
        'sales_type',
        'campaign_name',
        'status',
        'create_at',
        'update_by',
        'update_at',
        'advertiser_id',
        'customer_id'
    ];
    
    protected $connection = 'mysql';
    protected $table = 'campaign';
}
