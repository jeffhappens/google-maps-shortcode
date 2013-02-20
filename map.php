<?php $map_canvas = uniqid('map_'); ?>
<div class="<?php echo $map_canvas; ?>" style="width: 100%; height: 175px;"></div>
<script>
	function initialize() {
		var geocoder = new google.maps.Geocoder();
		var address = '<?php echo $location; ?>';
		geocoder.geocode({ 'address' : address}, function(results,status) {
			if(status == google.maps.GeocoderStatus.OK) {
				var myLatLng = results[0].geometry.location;
				console.log(myLatLng);
				var mapOptions = {
					center: myLatLng,
					zoom: 14,
					scrollwheel: false,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.querySelector('.<?php echo $map_canvas; ?>'), mapOptions);

				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					title: '<?php echo $title; ?>'
				})
			}
			else {
				var errmsg = 'Oops! Looks like there was a problem';
				console.log(errmsg);
				document.querySelector('.<?php echo $map_canvas; ?>').innerHTML = errmsg;
			}
		})
	}
	initialize();
</script>