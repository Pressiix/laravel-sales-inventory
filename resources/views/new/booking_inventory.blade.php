@extends('layouts.app')

@section('content')
      <div class="col-15 bg-fff">
        <div class="content-inventory">
          <h2>Booking Inventory</h2>
          <form>

            <div class="content-pdb2">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label pt-0">Website:</label>
                <div class="col-sm-11">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                    <label class="form-check-label" for="inlineRadio1">Bangkok Post</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Post Today</label>
                  </div>
                </div>
              </div>
              <div class="form-group--row bg-blue">
                <div class="col-left"><span><strong>Today inventory left:</strong></span> <span class="txt-blue">100,000</span> impressions</div>
                <div class="col-right"><a href="javascript:;" class="btn btn-click2">Click for booking inventory</a></div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Advertiser name:</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-auto col-sm-4 col-form-label pt-0">Ad type:</label>
                <div class="col-auto col-sm-11">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio3" value="option3" checked>
                    <label class="form-check-label" for="inlineRadio3">Banner</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio4" value="option4">
                    <label class="form-check-label" for="inlineRadio4">Native ad</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-auto col-sm-4 col-form-label pt-0">Device:</label>
                <div class="col-auto col-sm-11">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio5" value="option5" checked>
                    <label class="form-check-label" for="inlineRadio5">Desktop</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio6" value="option6">
                    <label class="form-check-label" for="inlineRadio6">Mobile</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Impression needed:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control">
                  <div class="text-ps--small">Must be 8-20 characters long.</div>
                </div>
                <div class="col-sm-3">
                  <div class="mt-2"><a href="javascript:;" class="btn btn-click">Save as draft</a></div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Detail:</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Upload file:</label>
                <div class="col-sm-11">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <div class="text-ps--small">Please choose only .JPG, GIF, AI, PSD, txt, Excel</div>
                </div>
              </div>
            </div>

            <div class="text-center"><button type="submit" value="send" class="btn btn-submit">Submit</button></div>

          </form>
        </div>
      </div>

<script>


    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

</script>
@endsection
