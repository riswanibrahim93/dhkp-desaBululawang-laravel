<html>
<head>
	<title>X, Y Coordinates using jQuery</title>
	<script src="{{ URL::asset('lib/datatables/jQuery-3.3.1/jquery-3.3.1.min.js') }}"></script>
	<style type="text/css">
		#marker {
			display: none;
			position: relative;
			max-height: 20px;
			max-width: 20px;
			text-decoration: none;
		}

		#map {
			max-width: 1500px;
			height: auto;
			display: block;
		}

		.anyClass {
			height:150px;
			overflow-x: scroll;
		}
	</style>
</head>
<body>
<table class="table table-responsive">
	<td>
	<img src="{{ URL::asset('test-map/marker.png') }}" id="marker"/>
	<img src="{{ URL::asset('test-map/maps.gif') }}" id="map"/>
	</td>
	</table>

	<div style="padding-top:20px;">
		<div id="coordx"></div>
		<div id="coordy"></div>
	</div>
	<script type="text/javascript">
		document.getElementById('map').onload = function(e){
			with(document.getElementById('marker')){
				e.pageX = 500-10;
				e.pageY = 500-10;
				style.left = e.pageX;
				style.top = e.pageY;
				style.display = 'block';
				style.position = 'absolute';
			}
		};

		$(document).ready(function() {
			$('#map').click(function(e) {
				var x = e.pageX;
				var y = e.pageY
				$('#marker').css({
					"left": x-10,
					"top": y-10,
					"display": "block;",
					"outline": "none;",
					"position": "absolute;"
				});
			});
		});
		$(document).ready(function() {
			$('#map').click(function(e) {
				var offset = $(this).offset();
				var X = (e.pageX - offset.left);
				var Y = (e.pageY - offset.top);
				$('#coordx').text(X);
				$('#coordy').text(Y);
			});
		});
	</script>
</body>
</html>
