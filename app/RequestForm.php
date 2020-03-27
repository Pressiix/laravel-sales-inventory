<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
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
    protected $table = 'request';

    public function relateAd()
    {
        return $this->hasOne('App\AdDescription','request_id');
    }
}
