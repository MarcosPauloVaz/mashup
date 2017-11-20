<?php $this->load->view('include/header'); ?>
  <body>
    <div id="map"></div>
    
    <div id="right-panel" style="background-color:#3c8dbc; padding: 1%; border-radius: 5px">
      <h2 style="color: #fff">Resultados <button  style="padding: 0px 12px;" class="btn btn-default" onclick="facebookLogout();">Sair</button></h2>
      <ul id="places"></ul>
      <button id="more">Mais resultados</button>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5nIFIEYrGj_2acAvMSy_NO4K-g-MSbY8&libraries=places&callback=initMap" async defer></script>
  </body>
</html>