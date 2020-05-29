
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
	
  <!-- HTML5 Shim for IE -->
  <!--[if IE]>
    <script src="assets/js/html5.js"></script>
  <![endif]-->
	
<title>Bangkok Post</title>
	
<script type="text/javascript" src="<?= url('/') ?>/assets/js/jquery.min.js"></script>

<link rel="stylesheet" href="<?= url('/') ?>/assets/bootstrap/css/bootstrap.css">
<script src="<?= url('/') ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<link href="<?= url('/') ?>/assets/fontawesome-5.6.3/css/all.css" rel="stylesheet">
<link href="<?= url('/') ?>/assets/css/animate.min.css" rel="stylesheet">

<link href="<?= url('/') ?>/assets/css/custom.css" rel="stylesheet" type="text/css">
<link href="<?= url('/') ?>/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= url('/') ?>/assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<style>
  .container{
      padding-top:120px;
  }
</style>
	
</head>

<body>
<!-- nav -->
<div class="content-pd"></div>


<section class="contentStatic-pageContent">
  <div class="container">
    <div class="row container--inventory">
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <div class="head--top">
            <div class="head--postgroup-logo"><img src="/assets/images/bkp-logo-blue-pdf.png" class="img-fluid" alt="" style="width:280px;"></div>
            <div class="head--postgroup-address">
              Bangkok Post Public Company Limited<br>
              135 Sunthorn Kosa Road, Klong Toey, Bangkok 10110
            </div>
          </div>
          <h2 class="text-center">Create Campaign Report</h2>

          <div class="content-pdb">
              <div class="form-group row">
                <label for="customerSelect" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Advertiser:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext"><?= (isset($item['advertiser_name']) ? $item['advertiser_name'] : '') ?></div>
                  <input type="hidden" name="advertiser_id" value="<?= (isset($item['advertiser_id']) ? $item['advertiser_id'] : '') ?>">
                  <input type="hidden" name="advertiser_name" value="<?= (isset($item['advertiser_name']) ? $item['advertiser_name'] : '') ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Campaign:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext"><?= (isset($item['campaign_name']) ? $item['campaign_name'] : '') ?></div>
                  <input type="hidden" name="campaign_name" value="<?= (isset($item['campaign_name']) ? $item['campaign_name'] : '') ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">Start Date:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext"><?= (isset($item['start']) ? $item['start'] : '') ?></div>
                  <input type="hidden" name="start" value="<?= (isset($item['start']) ? $item['start'] : '') ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputCampaign" class="col-sm-4 col-md-4 col-lg-3 col-form-label">End Date:</label>
                <div class="col-sm-11 col-md-11 col-lg-12">
                  <div class="form-control-plaintext"><?= (isset($item['end']) ? $item['end'] : '') ?></div>
                  <input type="hidden" name="end" value="<?= (isset($item['end']) ? $item['end'] : '') ?>">
                </div>
              </div>

            </div>

            <div class="content-pdb2">

          <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
              <thead class="thead-violet">
                <tr>
                  <th scope="col" class="text-nowrap">Line item</th>
                  <th scope="col">Date</th>
                  <th scope="col">Ad server Impressions</th>
                  <th scope="col">Ad server clicks</th>
                  <th scope="col">Ad server CTR</th>
                </tr>
              </thead>
              <tbody>
              <?php for($i=0;$i<count($item['item_name']);$i++){ ?>
                <tr>
                  <th scope="row" class="text-nowrap"><?= $item['campaign_name'] ?><input type="hidden" name="item_name[<?= $i ?>]" value="<?= (isset($item['item_name'][$i]) ? $item['item_name'][$i] : '') ?>"></th>
                  <td><?= $item['date'][$i] ?><input type="hidden" name="date[<?= $i ?>]" value="<?= (isset($item['date'][$i]) ? $item['date'][$i] : '') ?>"></td>
                  <td><?= $item['ad_server_impression'][$i] ?><input type="hidden" name="ad_server_impression[<?= $i ?>]" value="<?= (isset($item['ad_server_impression'][$i]) ? $item['ad_server_impression'][$i] : '') ?>"></td>
                  <td><?= $item['ad_server_click'][$i] ?><input type="hidden" name="ad_server_click[<?= $i ?>]" value="<?= (isset($item['ad_server_click'][$i]) ? $item['ad_server_click'][$i] : '') ?>"></td>
                  <td><?= $item['ad_server_ctr'][$i] ?>%<input type="hidden" name="ad_server_ctr[<?= $i ?>]" value="<?= (isset($item['ad_server_ctr'][$i]) ? $item['ad_server_ctr'][$i] : '') ?>"></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
            </div>
          
        </div>
      </div>
    </div>
  </div>
</section>



<script>
 let doc = new jsPDF('body','pt','a4',true);

doc.addHTML(document.getElementsByClassName("col-15 bg-fff")[0],function() {
    doc.save('html.pdf');
    window.close();
});
</script>
</body>
</html>
