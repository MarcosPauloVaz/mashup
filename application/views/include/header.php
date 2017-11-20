<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Mashup</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?= base_url('assets/admin/bootstrap/css/bootstrap.min.css') ?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?= base_url('assets/js/ionicons.min.css') ?>">
		<!-- Multiselect -->
		<link href="<?= base_url('assets/admin/bootstrap/css/bootstrap.multiselect.min.css') ?>" rel="stylesheet" type="text/css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/AdminLTE.min.css') ?>">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/skins/_all-skins.min.css') ?>">

		<link rel="stylesheet" href="<?= base_url('assets/admin/custom.css') ?>">

		<!-- jQuery 2.2.3 -->
		<script src="<?= base_url('assets/admin/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?= base_url('assets/js/jquery-ui.min.js') ?>"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?= base_url('assets/admin/bootstrap/js/bootstrap.min.js') ?>"></script>
		
		<!-- AdminLTE App -->
		<script src="<?= base_url('assets/admin/dist/js/app.min.js') ?>"></script>
		<!-- Multiselect -->
		<script src="<?= base_url('assets/admin/bootstrap/js/bootstrap.multiselect.min.js') ?>"></script>
		<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
     

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {

        position: absolute;
        right: 5px;
        top: 33%;
        margin-top: -195px;
        height: 97%;
        z-index: 5;
      
      }
      h2 {
        font-size: 22px;
        margin: 0 0 5px 0;
      }
      ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        height: 88%;
        width: 200px;
        overflow-y: scroll;
      }
      li {
        background-color: #f1f1f1;
        padding: 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
      }
      li:nth-child(odd) {
        background-color: #fcfcfc;
      }
      #more {
        width: 100%;
        margin: 5px 0 0 0;
      }
    </style>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
	  var meuponto;
      function initMap() {

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            var pyrmont = {lat: pos.lat, lng: pos.lng};
            //var pyrmont = {lat: -19.855942, lng: -43.985280};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: pyrmont,
              zoom: 17
            });
			
			meuponto = new google.maps.Marker({
				map: map,
				draggable: true,
			});

			meuponto.setPosition(pyrmont);
			var infowindow = new google.maps.InfoWindow({
	          content: '<strong style="color: #000">Você está aqui!</strong>',
	          position: pyrmont
	        });
	        infowindow.open(map);

            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
              location: pyrmont,
              radius: 5000,
              rankby: 'name',
              type: ['park']
            }, processResults);
        })
       } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }


      }

       
      

      function processResults(results, status, pagination) {
        if (status !== google.maps.places.PlacesServiceStatus.OK) {
          return;
        } else {
          createMarkers(results);

          if (pagination.hasNextPage) {
            var moreButton = document.getElementById('more');

            moreButton.disabled = false;

            moreButton.addEventListener('click', function() {
              moreButton.disabled = true;
              pagination.nextPage();
            });
          }
        }
      }

      function createMarkers(places) {
        var bounds = new google.maps.LatLngBounds();
        var placesList = document.getElementById('places');

        for (var i = 0, place; place = places[i]; i++) {
          
          var image = {
            
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          var marker = new google.maps.Marker({
            map: map,
            icon: image,
            title: place.name,
            position: place.geometry.location
          });
          
          placesList.innerHTML += '<li >' + place.name + '</li>';
          //placesList.innerHTML += '<li>' + place.name + '</li>';

          bounds.extend(place.geometry.location);
        }
        map.fitBounds(bounds);
	  }
	  
	 
    
    </script>
    <!--script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11&appId=1360958384031850';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script-->
<script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
<script>
   var wl = new WebLibras({
      position: WebLibrasIconPosition.Left
   });
</script>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();

    } else {
      // The person is not logged into your app or we are unable to tell.
     
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
      if (response.status === 'connected'){
        <?php $itens_sessao = array(
                'logado' => TRUE,
			  );
			  
        $this->session->set_userdata($itens_sessao);
        ?>
        window.location.replace(base_url('mashup'));
      }
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1360958384031850',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Bem vindo!  Recuperando suas informações.... ');
    FB.api('/me', function(response) {
      console.log('Acesso realizado para: ' + response.name);
     
    });
   
  }
  function facebookLogout(){
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                FB.logout(function(response) {
                    console.log('Realizando logoff... ');
                    FB.api('/me', function(response) {
                    console.log('Logoff realizado');
                    
                    }, window.location.replace(base_url('login/sair')));
                });
                //
            }else{
              window.location.replace(base_url('login/sair'));
            }
        })
    }
    function base_url($url){if($url === undefined) return '<?php echo base_url() ?>'; else return '<?php echo base_url() ?>' + $url;}
</script>
  </head>
