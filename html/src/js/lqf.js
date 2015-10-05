/**
 * Lqf
 *
 * @author Hein Bekker <hein@netbek.co.za>
 * @copyright (c) 2015 Hein Bekker
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GPLv2
 */

(function (window, undefined) {

	var namespace = 'Lqf';

	/**
	 *
	 * @param {String} str
	 */
	function log(str) {
		if (window.lqfConfig.get().core.debug) {
			console.log(str);
		}
	}

	/**
	 *
	 * @returns {LqfConfig}
	 */
	function LqfConfig() {
		this.flags = {
			set: false
		};

		this.config = {
			core: {
				debug: false // {Boolean}
			},
			front: {
				debug: true, // {Boolean}
				delay: 500,
				duration: 300,
				multiplier: 1.33
			}
		};
	}

	/**
	 *
	 * @returns {Boolean}
	 */
	LqfConfig.prototype.isDependenciesLoaded = function () {
		return true;
	};

	/**
	 *
	 * @param {Boolean} value
	 * @returns {Boolean}
	 */
	LqfConfig.prototype.isSet = function (value) {
		if (arguments.length > 0) {
			this.flags.set = value;
		}
		else {
			return this.flags.set;
		}
	};

	/**
	 *
	 * @param {Object} values
	 */
	LqfConfig.prototype.set = function (values) {
		lodash.merge(this.config, values);
	};

	/**
	 *
	 * @returns {Object}
	 */
	LqfConfig.prototype.get = function () {
		return this.config;
	};

	/**
	 *
	 * @returns {Lqf}
	 */
	function Lqf() {
		this.flags = {
			init: false // {Boolean}
		};
	}

	/**
	 *
	 * @returns {Boolean}
	 */
	Lqf.prototype.isDependenciesLoaded = function () {
		return !!(window.lqfConfig.isSet() && window.FastClick && window.jQuery && window.Promise && window.rhea && window.rhea.breakpoint && window.rhea.icon);
	};

	/**
	 *
	 * @param {Promise}
	 */
	Lqf.prototype.init = function () {
		log(namespace + '.init()');

		if (this.flags.init) {
			return this.initDeferred.promise;
		}

		this.initDeferred = Promise.defer();
		this.flags.init = true;

		// Init breakpoint listener.
		rhea.breakpoint.init();

		// Init FastClick.
		FastClick.attach(document.body);

		// Init front scene.
		(new lqf.Front()).init();

		this.initDeferred.resolve(true);

		return this.initDeferred.promise;
	};

	window.lqf = new Lqf();
	window.lqfConfig = new LqfConfig();

})(window);
