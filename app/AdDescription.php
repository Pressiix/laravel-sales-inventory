<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdDescription extends Model
{
    public $timestamps = false;

    protected $connection = 'mysql';    //specific db connection type 
    protected $table = 'ad_description';    //specific table name

    protected $fillable = [ //specific usable field
        'id',
        'bp_type',
        'bp_social',
        'bp_facebook',
        'bp_web',
        'bp_size',
        'bp_position',
        'bp_section',
        'bp_period_from',
        'bp_period_to',
        'bp_device',
        'bp_banner_url',
        'bp_banner_file',
        'bp_quotation_file',
        'bp_impression_need',
        'bp_ad_detail',
        'bp_campaign_budget',
        'ptd_type',
        'ptd_social',
        'ptd_facebook',
        'ptd_web',
        'ptd_size',
        'ptd_position',
        'ptd_section',
        'ptd_period_from',
        'ptd_period_to',
        'ptd_device',
        'ptd_banner_url',
        'ptd_banner_file',
        'ptd_quotation_file',
        'ptd_impression_need',
        'ptd_ad_detail',
        'ptd_campaign_budget',
        'request_id'
    ];

    /**Defining The Inverse Of The Relationship ad_description table => request table  */
    public function relateRequest()
    {
        return self::belongsTo('App\Request','id');  //foreign key field is 'id' (On request table)
    }
}
