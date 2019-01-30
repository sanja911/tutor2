<html lang="en">
<head>
  <title>Dumetschool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-optionClass').multiselect({
            includeSelectAllOption: true, // add select all option as usual
            optionClass: function(element) {
                var value = $(element).val();

                if (value%2 == 0) {
                    return 'even';
                }
                else {
                    return 'odd';
                }
            }
        });
    });
</script>
<style type="text/css">
    #example-optionClass-container .multiselect-container li.odd {
        background: #eeeeee;
    }
</style>
</head>
<body>

<div class="container">
  <h2>Dumetschool</h2>
  <p>Pilih Paket Kursus:</p>
	<div id="example-optionClass-container">
	    <select id="example-optionClass" multiple="multiple">
	        <option value="1">WM Ultimate</option>
	        <option value="2">WM Professional</option>
	        <option value="3">WM Premium</option>
	        <option value="4">GD Professional</option>
	        <option value="5">GD Ultimate</option>
	        <option value="6">GD Premium</option>
	    </select>
	</div>
</div>

</body>
</html>
