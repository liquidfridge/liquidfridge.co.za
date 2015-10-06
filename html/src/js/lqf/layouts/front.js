/**
 * Front layout
 *
 * @author Hein Bekker <hein@netbek.co.za>
 * @copyright (c) 2015 Hein Bekker
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GPLv2
 */

(function (window, lqf, undefined) {

	var namespace = 'LqfFront';

	/**
	 *
	 * @param {String} str
	 */
	function log(str) {
		if (lqfConfig.get().front.debug) {
			console.log(str);
		}
	}

	/**
	 *
	 * @returns {Front}
	 */
	function Front() {
		this.flags = {
			init: false, // {Boolean}
			playing: false // {Boolean}
		};

		this.$circles = undefined;
	}

	/**
	 *
	 * @returns {Promise}
	 */
	Front.prototype.init = function () {
		log(namespace + '.init()');

		if (this.flags.init) {
			return this.initDeferred.promise;
		}

		this.initDeferred = Promise.defer();
		this.flags.init = true;

		var config = lqfConfig.get().front;
		var self = this;

		//
		var total = 5;

		this.$circles = new Array(total);

		for (var i = 0; i < total; i++) {
			this.$circles[i] = jQuery('#bg-circle-' + i);
		}

		// Play animation if in landscape.
		if (rhea.breakpoint.includes('landscape')) {
			this.playAnim();
		}

		//
		rhea.breakpoint.on('change', function () {
			if (rhea.breakpoint.includes('medium') && rhea.breakpoint.includes('landscape')) {
				self.playAnim();
			}
			else {
				self.stopAnim();
			}
		});

		this.initDeferred.resolve(true);

		return this.initDeferred.promise;
	};

	/**
	 *
	 */
	Front.prototype.playAnim = function () {
		log(namespace + '.playAnim()');

		if (this.flags.playing) {
			log(namespace + '.playAnim() Cannot play because already playing');
			return;
		}

		this.flags.playing = true;

		var config = lqfConfig.get().front;
		var self = this;
		var total = self.$circles.length;

		function anim() {
			self.$circles[0].velocity({
				opacity: 1
			}, {
				delay: config.delay * 2,
				duration: config.duration,
				complete: function (elm) {
					if (!self.flags.playing) {
						return;
					}

					self.$circles[1].velocity({
						opacity: 1
					}, {
						delay: config.delay * Math.pow(config.multiplier, 1),
						duration: config.duration,
						complete: function (elm) {
							if (!self.flags.playing) {
								return;
							}

							self.$circles[2].velocity({
								opacity: 1
							}, {
								delay: config.delay * Math.pow(config.multiplier, 2),
								duration: config.duration,
								complete: function (elm) {
									if (!self.flags.playing) {
										return;
									}

									self.$circles[3].velocity({
										opacity: 1
									}, {
										delay: config.delay * Math.pow(config.multiplier, 3),
										duration: config.duration,
										complete: function (elm) {
											if (!self.flags.playing) {
												return;
											}

											self.$circles[4].velocity({
												opacity: 1
											}, {
												delay: config.delay * Math.pow(config.multiplier, 4),
												duration: config.duration,
												complete: function (elm) {
													if (!self.flags.playing) {
														return;
													}

													var i = 0;
													var j = 0;

													for (j = 0; j < total; j++) {
														self.$circles[j].velocity({
															opacity: 0
														}, {
															delay: config.delay * 2,
															duration: config.duration / 2,
															complete: function () {
																i++;

																if (i === total) {
																	anim();
																}
															}
														});
													}
												}
											});
										}
									});
								}
							});
						}
					});
				}
			});
		}

		anim();
	};

	/**
	 *
	 */
	Front.prototype.stopAnim = function () {
		log(namespace + '.stopAnim()');

		if (!this.flags.playing) {
			log(namespace + '.playAnim() Cannot stop because already stopped');
			return;
		}

		this.flags.playing = false;

		// Stop animations and reset opacity.
		lodash.forEach(this.$circles, function ($elm) {
			$elm.velocity('stop', true).css('opacity', 0);
		});
	};

	lqf.Front = Front;

})(window, window.lqf);
