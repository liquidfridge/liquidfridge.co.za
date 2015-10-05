/**
 * App config
 *
 * @author Hein Bekker <hein@netbek.co.za>
 * @copyright (c) 2015 Hein Bekker
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GPLv2
 */

(function (window, lqfConfig, rhea, undefined) {

	var intv = setInterval(function () {
		if (lqfConfig.isDependenciesLoaded()) {
			clearInterval(intv);

			rhea.breakpointConfig.set({
				mediaqueries: {
					small: 'only screen and (min-width: 0px)',
					medium: 'only screen and (min-width: 752px)',
					large: 'only screen and (min-width: 1008px)',
					xlarge: 'only screen and (min-width: 1360px)',
					xxlarge: 'only screen and (min-width: 1920px)',
					landscape: 'only screen and (orientation: landscape)',
					portrait: 'only screen and (orientation: portrait)',
					// http://css-tricks.com/snippets/css/retina-display-media-query
					retina: 'only screen and (-webkit-min-device-pixel-ratio: 2), ' +
							'only screen and (min--moz-device-pixel-ratio: 2), ' +
							'only screen and (-o-min-device-pixel-ratio: 2/1), ' +
							'only screen and (min-device-pixel-ratio: 2), ' +
							'only screen and (min-resolution: 192dpi), ' +
							'only screen and (min-resolution: 2dppx)'
				}
			});

			lqfConfig.isSet(true);
		}
	}, 20);

})(window, window.lqfConfig, window.rhea);
