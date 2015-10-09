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
				debug: false, // {Boolean}
				delay: 500,
				duration: 300,
				multiplier: 1.3
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

		var self = this;

		// Init breakpoint listener.
		rhea.breakpoint.init();

		// Init FastClick.
		FastClick.attach(document.body);

		// Init popup links.
		lodash.forEach(jQuery('a[data-popup]'), function (elm) {
			var $elm = jQuery(elm);
			$elm.on('click.' + namespace, function (e) {
				e.preventDefault();
				self.openWindow($elm.attr('href'), $elm.data('popupTitle'), $elm.data('popupWidth'), $elm.data('popupHeight'));
			});
		});

		// Init front scene.
		(new lqf.Front()).init();

		this.initDeferred.resolve(true);

		return this.initDeferred.promise;
	};

	/**
	 * Opens a new window.
	 *
	 * @param {String} url
	 * @param {String} title
	 * @param {Number} width
	 * @param {Number} height
	 */
	Lqf.prototype.openWindow = function (url, title, width, height) {
		if (lodash.isNull(url) || lodash.isUndefined(url)) {
			log(namespace + '.popup() URL is required');
			return;
		}

		if (lodash.isNull(title) || lodash.isUndefined(title)) {
			title = '';
		}

		if (isNaN(width) || !width) {
			width = 200;
		}
		else {
			width = Number(width);
		}

		if (isNaN(height) || !height) {
			height = 200;
		}
		else {
			height = Number(height);
		}

		var position = '';

		if (window.screen && window.screen.availWidth) {
			var top = (window.screen.availHeight / 2) - (height / 2);
			var left = (window.screen.availWidth / 2) - (width / 2);
			position = ', top=' + top + ', left=' + left;
		}

		var features = 'toolbar=0, scrollbars=1, location=0, statusbar=0, menubar=0, resizable=1, width=' + width + ', height=' + height + position;
		var newWindow = window.open(url, title, features);

		if (window.focus) {
			newWindow.focus();
		}
	};

	window.lqf = new Lqf();
	window.lqfConfig = new LqfConfig();

})(window);
