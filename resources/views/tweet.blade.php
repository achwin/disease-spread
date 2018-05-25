<html lang="en">
<head>
  <title>Disease spread</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/datepicker.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="{{asset('js/datepicker.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClpt0QcdXEJYjkft0qCbWRtp7t3ff8Gwk&libraries=places&callback=initAutocomplete" async defer></script>
</head>
<body>

  <div class="container">
    <h2>Disease spread</h2>
    <form class="form-horizontal" method="POST" action="{{url('tweet')}}">
      @csrf
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Keyword:</label>
        <div class="col-md-10">
          <select style="width: 50%" class="js-example-basic-single" name="keyword">
            <option value="tbc">Tuberkulosis</option>
            <option value="dbd">Demam berdarah</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Since:</label>
        <div class="col-md-10">
          <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          <input name="since" data-toggle="datepicker">
          </div>  
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Until:</label>
        <div class="col-md-10">
          <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
          <input name="until" data-toggle="datepicker">
          </div>  
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Location:</label>
        <div class="col-md-10">
          <input type="text" style='width:20em' name="location" id="location">
        </div>
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
  </div>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
      width: 'resolve'
    });
    $('[data-toggle="datepicker"]').datepicker({
      format: 'yyyy-mm-dd'
    });
    });
</script>

<script type="text/javascript">
  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('location')),
        {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

  }
    </script>
</html>