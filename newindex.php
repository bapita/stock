<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- PHP Code TO get Data -->

<script type="text/javascript">
    $(document).ready(function(){
        $("#btnFetch").click(function(){
			var symbol = $("#symbol").val();
            $.ajax({
                type: 'POST',
				data: {symbol:symbol},
                url: 'fetch.php',
                success: function(data) {
                    $("#stock").html(data);
                }
            });
		});
	});
	$(document).on('click', '#btnFind', function() {
		var name = $("#name").val();
		if(name != ""){
			$.ajax({
                url: 'find.php',
				type: 'POST',
				data: {name:name},
                success: function(data) {
                    $("#tbody").html(data);
					$("#name").clear();
                }
            });
		}
		else{
				alert("Enter Company Name");
		}
            
	});
</script><div class="container">
<div class="col-md-12" style="margin-top:20px;">
    <div style="text-align:center;">
         <h1>Stock System Using API </h1>
    </div>
</div>
    <div class="row" style="margin-left:100px;margin-top:50px;">
		<div class="col-md-6 centered">
			<form class="form-inline">
	    	<div class="form-group">
	    		<input type="text" placeholder="Find Company Symbol" class="form-control" id="name">
	    	</div>
	    	<button type="button"  id="btnFind" class="btn btn-success" style="margin-left:20px;" >Find Now</button>
	    </form>
		</div>
		
		<div class="col-md-6">
			<form class="form-inline">
	    	<div class="form-group">
	    		<input type="text" placeholder="Enter Company Symbol"  class="form-control" id="symbol">
	    	</div>
	    	<button type="button"  id="btnFetch" class="btn btn-success" style="margin-left:20px;" >Fetch Data</button>
	    </form>
		</div>
	</div>
	<center><h2 style="margin-top:30px;">Company Find</h2></center>
	<div class="row" id="symbol" style="margin-top:30px">
		<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Symbol</th>
			</tr>
		</thead>
		<tbody id="tbody">
			
		</tbody>
		</table>
	</div>
	<center><h2 style="margin-top:30px;">Live Stock Data</h2></center>
	<div class="row" id="stock"style="margin-top:30px;">
		
		
	</div>
</div>
</body>
</html>