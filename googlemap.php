<?php
/* mm_widget_googlemap
 * @version 1.0.0
 * @description upgrades template variable by showing an interactive Google Map and autocompleted geolocation search field
 * @author Danilo Cuculić (eoler@castus.me)
 *
 * @param $options {string} - parameters passed to map UI
 */
function mm_widget_googlemap($field, $roles='', $templates='', array $config=null) {
 global $modx, $mm_fields, $modx_lang_attribute;
  static $defmapopts = array(
    'width' => "auto",
    'height' => "450",
    'center' => "52.5,13.5", // default: Rijeka, Croatia
    'gmapOptions' => array(
      'minZoom' => 5,
      'zoom' => 15,
      'maxZoom' => 25,
      'draggable' => true,
      'scrollwheel' => true
    )
  );

  $evt = &$modx->Event;
  if ($evt->name == 'OnDocFormRender' && useThisRule($roles, $templates)) {
    $fieldName = $mm_fields[$field]['fieldname'];
    $mapopts = $defmapopts;
    if (is_array($config)) {
      $mapopts = array_replace_recursive($defmapopts, $config);
    }
    $jsopts = json_encode($mapopts);
    if (intval($mapopts['width']) > 0) $mapopts['width'] .= "px";
    if (intval($mapopts['height']) > 0) $mapopts['height'] .= "px";
		$output = "//  -------------- GoogleMap widget ------------- \n";
		$output .= includeJs($modx->config['base_url'] .'assets/plugins/managermanager/widgets/googlemap/googlemap.js');
    $output .= "      var elmfield = \$j('#{$fieldName}');
      var elmparent = elmfield.parents('tr:first');
      var elmsection = \$j('<div class=\"sectionHeader\">'+ elmparent.find('.warning').text() +'</div><div id=\"sect_{$fieldName}\" class=\"sectionBody tmplvars\"><div class=\"mmwidgetGoogleMap_{$fieldName}\" style=\"position:relative; width:{$mapopts['width']}; height:{$mapopts['height']};\"></div></div>');
      elmparent.hide().prev('tr').hide();
      elmfield.parents('.tab-page:first').append(elmsection);
      elmfield.insertBefore('.mmwidgetGoogleMap_{$fieldName}');
      \$j('<input type=\"text\" id=\"geoloc_{$fieldName}\" name=\"geoloc_{$fieldName}\" tvtype=\"text\" style=\"width:60%; float:right;\">').insertAfter(elmfield);
      window.pagemapsloaded = function(){ googlemaptv('{$fieldName}', elmsection, {$jsopts}); };
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
