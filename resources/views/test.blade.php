@extends('layouts.app')

@section('content')

<script>
    var jArray = <?php echo json_encode($phpArray); ?>['bp_ad_section'];
    //var position = jArray['bp_ad_section'][1]['position'];
    for(i=1;i<=Object.keys(jArray).length;i++){
        console.log("Position = "+jArray[i]['position']);
        for(j=1;j<Object.keys(jArray[i]).length;j++){
            console.log(j+" = "+jArray[i][j]);
        }
    }
    
  

</script>

@endsection