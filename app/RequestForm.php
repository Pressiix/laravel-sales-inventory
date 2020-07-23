<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    public $timestamps = false;
    
    protected $fillable = [ //specific usable field
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
    
    protected $connection = 'mysql';    //specific db connection type 
    protected $table = 'request';   //specific table name

    /**Relationship between request table and ad_description table (One To One) */
    public function relateAd()
    {
        return $this->hasOne('App\AdDescription','request_id'); //foreign key field is 'request_id' (On ad_description table)
    }

}
