@extends('layouts.app')
@section('title', 'Sale Inventory - Pending List')
<style>
    input{
        width:300px;
    }
    label{
        width:100px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row col-md-12">
        <div class="card col-md-3">

                <div class="card-body">
                    <img src="image/avatar.png" alt="Avatar" style="display:block;margin: 0 auto;width:150px;height:150px;border-radius: 50%;">
                    
                    <div class="text-center">
                        <h4><b>{{ $user->name }}</b></h4>
                    </div>
                    <hr>
                    <a href="/profile">MY ACCOUNT</a><br/>
                    <a href="/pending-list">INBOX</a><br/>
                    <a href="#">MY ACTIVITIES</a>
                </div>
            </div><div class="col-md-1"></div>
            <div class="card col-md-8">

                <div class="card-body">
                <h3>INBOX - PENDING LISTS</h3><br/>
                
                <?php if($someModel){ ?>
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
                                <?php foreach($someModel as $item){ ?>
                                <tr>
                                    <td><?= $item['id'] ?></td>
                                    <td><?=  $item['create_at'] ?></td>
                                    <td><?=  $item['sales_name'] ?></td>
                                    <td><?=  $item['sales_type'] ?></td>
                                    <td><?=  $item['campaign_name'] ?></td>
                                    <td><?= $item['status'] ?></td>
                                    <td><a href="#">Click</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection