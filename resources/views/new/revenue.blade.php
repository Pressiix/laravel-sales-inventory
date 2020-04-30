@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory--full">
          <h2>Revenue Report</h2>
          {{ Form::open(['route' => '/revenue', 'method' => 'GET'])}}

            <div class="content-pdb2">
              <div class="form-group">
                 <div class="input-daterange datepicker">
                  <div class="input-group-inline"><span><strong>Period:</strong></span></div>
                  <div class="input-group-inline">
                    <span>From</span>
                    <input type="text" class="form-control form-input--date" name="start" autocomplete="off">
                    <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                  </div>
                  <div class="input-group-inline">
                    <span>to</span>
                    <input type="text" class="form-control form-input--date" name="end" autocomplete="off">
                    <span><img src="assets/images/icon-svg/calendar.svg" width="20"></span>
                  </div>
                  <button type="submit" class="btn btn-click2">Apply</button>
                </div>
              </div>
            </div>
          {{ Form::close() }}
            <div class="content-border">

              <ul class="nav nav-tabs nav-requestForm" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="bangkokpost-tab" data-toggle="tab" href="#bangkokpost" role="tab" aria-controls="bangkokpost" aria-selected="true">Bangkokpost</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="posttoday-tab" data-toggle="tab" href="#posttoday" role="tab" aria-controls="posttoday" aria-selected="false">Posttoday</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="bangkokpost" role="tabpanel" aria-labelledby="bangkokpost-tab">
                  
                  <div class="content-tablist">
 
                    <div class="table-responsive table-inventory">
                      <table id="bkp" class="table table-striped table-bordered text-center">
                        <thead class="thead-bkp">
                          <tr>
                            <th scope="col"><a href="javascript:sortTable(0,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Date</span></th>
                            <th scope="col"><a href="javascript:sortTable(1,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Sale name</span></th>
                            <th scope="col"><a href="javascript:sortTable(2,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>PT/BP</span></th>
                            <th scope="col"><a href="javascript:sortTable(3,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Section</span></th>
                            <th scope="col"><a href="javascript:sortTable(4,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Position</span></th>
                            <th scope="col"><a href="javascript:sortTable(5,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Campaign type</span></th>
                            <th scope="col"><a href="javascript:sortTable(6,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Impression</span></th>
                            <th scope="col" class="text-nowrap"><a href="javascript:sortTable(7,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Campaign<br>Budget (THB)</span></th>
                            <th scope="col"><a href="javascript:sortTable(8,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Detail</span></th>
                            <th scope="col"><a href="javascript:sortTable(9,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Start Date</span></th>
                            <th scope="col"><a href="javascript:sortTable(10,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>End Date</span></th>
                            <th scope="col"><a href="javascript:sortTable(11,'bkp','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Event</span></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($bp as $item){ ?>
                            <tr>
                              <td scope="row"><?= date("d/m/Y",strtotime($item['create_at'])) ?></td>
                              <td class="text-left text-nowrap"><?= $item['sales_name'] ?></td>
                              <td><?= $item['type'] ?></td>
                              <td class="text-nowrap"><?= $item['bp_section'] ?></td>
                              <td class="text-nowrap"><?= $item['bp_position'] ?></td>
                              <td class="text-nowrap"><?= $item['campaign_name'] ?></td>
                              <td class="text-right"><?= number_format((float)$item['bp_impression_need']) ?></td>
                              <td class="text-right"><?= number_format((float)$item['bp_campaign_budget']) ?></td>
                              <td class="text-nowrap"><?= $item['bp_ad_detail'] ?></td>
                              <td><?= date("d/m/Y",strtotime($item['bp_period_from'])) ?></td>
                              <td><?= date("d/m/Y",strtotime($item['bp_period_to'])) ?></td>
                              <td class="text-nowrap">1-30 Nov 19</td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                  </div>

                </div>
                <div class="tab-pane fade" id="posttoday" role="tabpanel" aria-labelledby="posttoday-tab">
                  
                  <div class="content-tablist">

                    <div class="table-responsive table-inventory">
                      <table id="ptd" class="table table-striped table-bordered text-center">
                        <thead class="thead-ptd">
                          <tr>
                            <th scope="col"><a href="javascript:sortTable(0,'ptd','ASC');" class="btn-sort" ><img src="assets/images/icon-svg/arrow.svg"></a><span>Date</span></th>
                            <th scope="col"><a href="javascript:sortTable(1,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Sale name</span></th>
                            <th scope="col"><a href="javascript:sortTable(2,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>PT/BP</span></th>
                            <th scope="col"><a href="javascript:sortTable(3,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Section</span></th>
                            <th scope="col"><a href="javascript:sortTable(4,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Position</span></th>
                            <th scope="col"><a href="javascript:sortTable(5,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Campaign type</span></th>
                            <th scope="col"><a href="javascript:sortTable(6,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Impression</span></th>
                            <th scope="col" class="text-nowrap"><a href="javascript:sortTable(7,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Campaign<br>Budget (THB)</span></th>
                            <th scope="col"><a href="javascript:sortTable(8,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Detail</span></th>
                            <th scope="col"><a href="javascript:sortTable(9,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Start Date</span></th>
                            <th scope="col"><a href="javascript:sortTable(10,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>End Date</span></th>
                            <th scope="col"><a href="javascript:sortTable(11,'ptd','ASC');" class="btn-sort"><img src="assets/images/icon-svg/arrow.svg"></a><span>Event</span></th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($ptd as $item){ ?>
                            <tr>
                              <td scope="row"><?= date("d/m/Y",strtotime($item['create_at'])) ?></td>
                              <td class="text-left text-nowrap"><?= $item['sales_name'] ?></td>
                              <td><?= (isset($item['type']) ? $item['type'] : "") ?></td>
                              <td class="text-nowrap"><?= (isset($item['ptd_section']) ? $item['ptd_section'] : "") ?></td>
                              <td class="text-nowrap"><?= (isset($item['ptd_position'] ?></td>
                              <td class="text-nowrap"><?=(isset($item['campaign_name'] ?></td>
                              <td class="text-right"><?= (isset($item['ptd_impression_need']) ? ((float)$item['ptd_impression_need']): "") ?></td>
                              <td class="text-right"><?= (isset($item['ptd_campaign_budget']) ? number_format((float)$item['ptd_campaign_budget']) : "") ?></td>
                              <td class="text-nowrap"><?=(isset($item['ptd_ad_detail'] ?></td>
                              <td><?= (isset(("d/m/Y",strtotime($item['ptd_period_from'])) ?></td>
                              <td><?= (isset(("d/m/Y",strtotime($item['ptd_period_to'])) ?></td>
                              <td class="text-nowrap">1-30 Nov 19</td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                  </div>

                </div>
              </div>

            </div>

            <div class="text-center"><button type="submit" value="send" class="btn btn-submit">download</button></div>

            
        </div>
      </div>

<script>


    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        orientation: "bottom"
    });

    $('#myTab a#posttoday-tab').on('click', function (e) {
      e.preventDefault()
      $('.nav-requestForm').addClass('tabs--ptd');
    })
    $('#myTab a#bangkokpost-tab').on('click', function (e) {
      e.preventDefault()
      $('.nav-requestForm').removeClass('tabs--ptd');
    })

    function sortTable(index,table_name,option) {
      
      var table, rows, switching, i, x, y, shouldSwitch;
      
      table = document.getElementById(table_name);
      
      switching = true;
      /*Make a loop that will continue until
      no switching has been done:*/
      while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length); i++) {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
          one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("TD")[index];
          y = rows[i + 1].getElementsByTagName("TD")[index];
          //console.log(x.innerHTML.toLowerCase());
          //check if the two rows should switch place:
          if(index == 6 || index == 7)
          {
            if(option == "ASC"){
            //compare with currency format
            if (Number(x.innerHTML.toLowerCase().replace(/[^0-9.-]+/g,"")) > Number(y.innerHTML.toLowerCase().replace(/[^0-9.-]+/g,"")) ) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
            }else if(option == "DESC"){
              if (Number(x.innerHTML.toLowerCase().replace(/[^0-9.-]+/g,"")) < Number(y.innerHTML.toLowerCase().replace(/[^0-9.-]+/g,"")) ) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
          }else{
            
            if(option == "ASC"){
            //compare with currency format
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
            }else if(option == "DESC"){
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
            }
          }
          
        }
        if (shouldSwitch) {
          /*If a switch has been marked, make the switch
          and mark that a switch has been done:*/
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }
</script>
@endsection
