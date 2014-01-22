GoogleMaps widget for ManagerManager plugin
===========================================

Integrates interactive map widget into MODX CMF backend resource management
including two-way synchronization with the geolocation template variable
and autocompleting search field based on Places library for GoogleMaps.


Usage
-----
```php
mm_widget_googlemap("tplvar_latlong" ...);
```


Contributors
------------

## Oori
* initial GoogleMaps v2 API widget prototype

## DivanDesign (http://code.divandesign.biz/modx/mm_ddgmap)
* backend UI styling

## UbiLabs (https://github.com/ubilabs/geocomplete)
* GeoComplete jQuery plugin


Changelog
---------

## 0.9.2 (2014-01-21)
- added business establishments to searched locations

## 0.9.1 (2014-01-10)
- added geolocation search field with jQuery plugin GeoComplete v1.4.1

## 0.9.0 (2014-01-09)
- initial widget based on GoogleMaps API v3
