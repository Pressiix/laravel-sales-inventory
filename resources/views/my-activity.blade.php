@extends('layouts.app')
@section('title', 'Sale Inventory - My Activities')
<style>
    
    label{
        width:100px;
    }
    th,td{
        font-size:14px;
        font-weight:bold;
    }
    thead{
        background-color:#00BAA5
    }
    input[class=wide-custom]{
        width : 30%;
    }
</style>

@section('content')
   
            
            <div class="card col-md-9">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5"><h1>MY ACTIVITIES</h1></div>
                        <div class="col-md-7"><b>Period</b> 
                            from {!! Form::date('date_from', null, ['class'=>'wide-custom','required'=>'required']) !!}
                            <i class="fa fa-calendar"></i>
                            to {!! Form::date('date_from', null, ['class'=>'wide-custom','required'=>'required']) !!}
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                <br/>
                <div style="overflow-x:auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Row</th>
                                    <th>Date received</th>
                                    <th>Requester Name</th>
                                    <th>Type</th>
                                    <th>Campaign Name</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr> 
                            </thead>
                            <tbody>
                            <?php if($someModel){ ?>
                                <?php foreach($someModel as $item){ ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?=  $item['create_at'] ?></td>
                                    <td><?=  $item['sales_name'] ?></td>
                                    <td>Inventory<!--<?=  $item['sales_type'] ?>--></td>
                                    <td><?=  $item['campaign_name'] ?></td>
                                    <td><?= $item['status'] ?></td>
                                    <td><a href="#">Click</a></td>
                                </tr>
                                <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td class="text-center" colspan="7">No Data</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection