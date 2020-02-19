@extends('layouts.app')
@section('title', 'Sale Inventory - Pending Lists')
<style>
    input{
        width:300px;
    }
    label{
        width:100px;
    }
</style>

@section('content')
   
            
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
@endsection