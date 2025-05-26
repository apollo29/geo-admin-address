import atk from 'atk';
import mapService from './services/geo.admin.service';
import geoAdminLookupPlugin from './plugins/geo-admin-lookup.plugin';

if (typeof atk !== 'undefined') {
  // Register atkAddressLoukup as jQuery plugin.
  atk.registerPlugin('AddressLookup', geoAdminLookupPlugin);

  if (!atk.mapService) {
    atk.mapService = mapService;
  }
}
