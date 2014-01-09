
function googlemaptv(fldName, elmSection, locDefault) {

  var elmfield = $j('#'+fldName);
  elmfield.css({width:"33%"});

  var deflatlng = elmfield.val();
  if (deflatlng == '') deflatlng = locDefault;
  deflatlng = deflatlng.split(',');
  
  var mapopts = {
    minZoom: 5, zoom: 15, maxZoom: 25,
    center: new google.maps.LatLng(deflatlng[0], deflatlng[1]),
    mapTypeId: google.maps.MapTypeId.HYBRID,
    draggable: true,
    scrollwheel: true
  };
  var gmap = new google.maps.Map(elmSection.find('.mmwidgetGoogleMap_'+fldName).get(0), mapopts);
  var gmarker = new google.maps.Marker({
    position: new google.maps.LatLng(deflatlng[0], deflatlng[1]),
    map: gmap,
    draggable: true
  });
  google.maps.event.addListener(gmarker, 'drag', function(evt){
    var poslatlng = evt.latLng;
    elmfield.val(poslatlng.lat() +','+ poslatlng.lng());
  });
  google.maps.event.addListener(gmap, 'rightclick', function(evt){
    var poslatlng = evt.latLng;
    gmarker.setPosition(poslatlng);
    //gmap.setCenter(poslatlng);
    elmfield.val(poslatlng.lat() +','+ poslatlng.lng());
  });

}
