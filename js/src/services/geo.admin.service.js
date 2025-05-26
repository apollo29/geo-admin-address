/* global _ATK_GOOGLE_VERSION_:true, */

/**
 * Singleton class for handling google map api.
 */
class GeoAdminService {
  static getInstance () {
    return this.instance;
  }

  constructor () {
    if (!this.instance) {
      this.instance = this;
      this.version = () => _ATK_GOOGLE_VERSION_;
      this.map = {
        api: null,
        loader: null
      };
    }
    return this.instance;
  }

  /**
   * Get google api.
   * @returns {Promise}
   */
  loadGoogleApi ($options) {
    if (!this.map.loader) {
      this.setMapLoader($options);
    }

    return this.map.loader.load();
  }
}

const mapService = new GeoAdminService();
Object.freeze(mapService);

export default mapService;
