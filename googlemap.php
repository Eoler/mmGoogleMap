<?php
/* mm_widget_googlemap
 * @version 0.9.1
 * @description Shows an interactive Google Map with two-way geolocation sync and autocompleted PoI search field
 * @author Danilo Cuculić (eoler@castus.me)
 *
 * @param $mapw {string; integer} - width of the map, default: auto (whole container)
 * @param $maph {integer} - height of the map control, default: 450 (px)
 * @param $mapdefloc {string} - center map on latlng if location field empty, default: Rijeka, Croatia
 */
function mm_widget_googlemap($field, $mapw='auto', $maph='450', $mapdefloc='52.5,13.5', $roles='', $templates='') {
 global $modx, $mm_fields, $modx_lang_attribute;

  $evt = &$modx->Event;
  if ($evt->name == 'OnDocFormRender' && useThisRule($roles, $templates)) {
    $fieldName = $mm_fields[$field]['fieldname'];
    if (intval($mapw) > 0) $mapw .= "px";
    if (intval($maph) > 0) $maph .= "px";
		$output = "//  -------------- GoogleMap widget ------------- \n";
		$output .= includeJs($modx->config['base_url'] .'assets/plugins/managermanager/widgets/googlemap/googlemap.js');
    $output .= "      var elmfield = \$j('#{$fieldName}');
      var elmparent = elmfield.parents('tr:first');
      var elmsection = \$j('<div class=\"sectionHeader\">'+ elmparent.find('.warning').text() +'</div><div id=\"sect_{$fieldName}\" class=\"sectionBody tmplvars\"><div class=\"mmwidgetGoogleMap_{$fieldName}\" style=\"position:relative; width:{$mapw}; height:{$maph};\"></div></div>');
      elmparent.hide().prev('tr').hide();
      elmfield.parents('.tab-page:first').append(elmsection);
      elmfield.insertBefore('.mmwidgetGoogleMap_{$fieldName}');
      \$j('<input type=\"text\" id=\"geoloc_{$fieldName}\" name=\"geoloc_{$fieldName}\" tvtype=\"text\" style=\"width:60%; float:right;\">').insertAfter(elmfield);;
      window.pagemapsloaded = function(){ googlemaptv('{$fieldName}', elmsection, '{$mapdefloc}'); };
    function loadGmapscript(){
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = '//maps.google.com/maps/api/js?v=3&sensor=false&callback=pagemapsloaded&language={$modx_lang_attribute}&libraries=places';
      document.body.appendChild(script);
    }
    window.onload = loadGmapscript;\n";
    $evt->output($output);
	}
	
}
