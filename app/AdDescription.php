<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdDescription extends Model
{
    public $timestamps = false;

    protected $connection = 'mysql';
    protected $table = 'ad_description';

    protected $fillable = [
        'id',
        'bp_facebook',
        'bp_web',
        'bp_size',
        'bp_position',
        'bp_section',
        'bp_period_from',
        'bp_period_to',
        'bp_device',
        'bp_url',
        'bp_banner_file',
        'bp_quotation_file',
        'bp_impression',
        'bp_detail',
        'bp_campaign_budget',
        'ptd_facebook',
        'ptd_web',
        'ptd_size',
        'ptd_position',
        'ptd_section',
        'ptd_period_from',
        'ptd_period_to',
        'ptd_device',
        'ptd_url',
        'ptd_banner_file',
        'ptd_quotation_file',
        'ptd_impression',
        'ptd_detail',
        'ptd_campaign_budget',
        'request_id'
    ];

    public function relateRequest()
    {
        return self::belongsTo('App\Request','id');
    }
}
