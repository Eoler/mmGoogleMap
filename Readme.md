GoogleMaps widget for ManagerManager plugin
===========================================

Integrates interactive map widget into MODX CMF backend resource management
including two-way synchronization with the geolocation template variable
and autocompleting search field based on Places library for GoogleMaps.
Requires PHP 5.3+ and ManagerManager 0.3+


Installation
------------
Unzip to assets/plugins/managermanager/widgets/googlemap


Usage
-----
```php
mm_widget_googlemap("tplvar_name", "role_ids", "template_ids", "config_arr");
```


Contributors
------------

* Oori (http://forums.modx.com/u/oori)
    - initial GoogleMaps v2 API widget prototype
* DivanDesign (http://code.divandesign.biz/modx/mm_ddgmap)
    - backend UI styling
* UbiLabs (https://github.com/ubilabs/geocomplete)
    - GeoComplete jQuery plugin


Changelog
---------

### 1.0.1 (2014-02-02)
- parametrized GoogleMaps API loading with key (gapikey)
- added GoogleMaps marker positioning event config option (default: rightclick)

### 1.0.0 (2014-01-24)
- added configuration options parameter
- added GoogleMaps options propagation and defaults extension

### 0.9.2 (2014-01-22)
- added business establishments to searched locations

### 0.9.1 (2014-01-10)
- added geolocation search field with jQuery plugin GeoComplete v1.4.1

### 0.9.0 (2014-01-09)
- initial widget based on GoogleMaps API v3
