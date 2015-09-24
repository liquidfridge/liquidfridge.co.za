<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IEMobile 7 ]> <html class="no-js iem7" lang="en"> <![endif]-->
<!--[if (gt IE 8)|(gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<title>{Title}{block:PostSummary} | {PostSummary}{/block:PostSummary}{block:SearchPage} | {lang:Search results for SearchQuery}{/block:SearchPage}</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<!--<meta name="HandheldFriendly" content="True" />-->
		<!--<meta name="MobileOptimized" content="0" />-->
		<!--<meta name="viewport" content="initial-scale=1.0,width=device-width,target-densitydpi=device-dpi" />-->
		<meta http-equiv="imagetoolbar" content="false" />
		<meta name="MSSmartTagsPreventParsing" content="true" />
		<meta http-equiv="cleartype" content="on" />

		<meta name="description" content="{MetaDescription}" />
		<!--<meta name="keywords" content="" />-->
		<meta name="copyright" content="(cc-by) {Title}. Some Rights Reserved." />

		<meta property="og:title" content="{Title}" />
		<meta property="og:description" content="{MetaDescription}" />

		<meta name="geo.placename" content="South Africa" />
		<meta name="geo.position" content="-30.559482;22.937506" />
		<meta name="geo.region" content="ZA-WC" />
		<meta name="geo.country" content="ZA" />
		<meta name="ICBM" content="-30.559482, 22.937506" />

		<meta name="google-site-verification" content="uZABfSFbTrO7Gk5MXtRF6PBw7P9Ujwf4f0wGwd1xPQs" />
		<!--<meta name="y_key" content="" />-->
		<!--Shuffler-667348f73939e109952b5ea407ada705-->

		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://cdn.liquidfridge.co.za/apple-touch-icon-152x152-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://cdn.liquidfridge.co.za/apple-touch-icon-144x144-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="http://cdn.liquidfridge.co.za/apple-touch-icon-120x120-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://cdn.liquidfridge.co.za/apple-touch-icon-114x114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="http://cdn.liquidfridge.co.za/apple-touch-icon-76x76-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://cdn.liquidfridge.co.za/apple-touch-icon-72x72-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="http://cdn.liquidfridge.co.za/apple-touch-icon-57x57-precomposed.png" />
		<link rel="apple-touch-icon" href="http://cdn.liquidfridge.co.za/apple-touch-icon.png" />
		<link rel="icon" href="http://cdn.liquidfridge.co.za/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="http://cdn.liquidfridge.co.za/favicon.ico" type="image/x-icon" />

		<link rel="alternate" type="application/rss+xml" title="{Title}" href="http://feeds.feedburner.com/liquidfridge" />

		<link rel="stylesheet" href="http://cdn.liquidfridge.co.za/assets/0.3.6/css/base.css" media="screen" />
		<link rel="stylesheet" href="http://cdn.liquidfridge.co.za/assets/0.3.6/css/vendor/normalize.css/normalize.css" media="screen" />
		<link rel="stylesheet" href="http://cdn.liquidfridge.co.za/assets/0.3.6/css/blog.css" media="screen" />
		<link rel="stylesheet" href="http://cdn.liquidfridge.co.za/assets/0.3.6/css/blog_960.css" media="screen and (min-width: 960px)" />

		<noscript><link rel="stylesheet" href="http://cdn.liquidfridge.co.za/assets/0.3.6/css/icons.fallback.css" media="screen" /></noscript>
		<script>
			/* grunticon Stylesheet Loader | https://github.com/filamentgroup/grunticon | (c) 2012 Scott Jehl, Filament Group, Inc. | MIT license. */
			window.grunticon = function(e) {
				if (e && 3 === e.length) {
					var t = window, n = !!t.document.createElementNS && !!t.document.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect, A = function(A) {
						var o = t.document.createElement("link"), r = t.document.getElementsByTagName("script")[0];
						o.rel = "stylesheet", o.href = e[A && n ? 0 : A ? 1 : 2], r.parentNode.insertBefore(o, r)
					}, o = new t.Image;
					o.onerror = function() {
						A(!1)
					}, o.onload = function() {
						A(1 === o.width && 1 === o.height)
					}, o.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
				}
			};
			grunticon([
				'http://cdn.liquidfridge.co.za/assets/0.3.6/css/icons.data.svg.css',
				'http://cdn.liquidfridge.co.za/assets/0.3.6/css/icons.data.png.css',
				'http://cdn.liquidfridge.co.za/assets/0.3.6/css/icons.fallback.css'
			]);
		</script>

		<script src="http://cdn.liquidfridge.co.za/assets/0.3.6/js/vendor/Respond/dest/respond.min.js"></script>
		<script src="http://cdn.liquidfridge.co.za/assets/0.3.6/js/vendor/Modernizr/modernizr.custom.05803.js"></script>

		<script>
			function popup (url, title, width, height) {
				var position = '';

				if (window.screen && window.screen.availWidth) {
					var top = (window.screen.availHeight / 2) - (height / 2);
					var left = (window.screen.availWidth / 2) - (width / 2);
					position = ', top=' + top + ', left=' + left;
				}

				var newWindow = window.open(url, title, 'toolbar=0, scrollbars=1, location=0, statusbar=0, menubar=0, resizable=1, width=' + width + ', height=' + height + position);

				if (window.focus) {
					newWindow.focus();
				}
			}
		</script>
	</head>

	<body>
		<div class="hidden"><img src="http://cdn.liquidfridge.co.za/assets/0.3.6/img/250.jpg" alt="" /></div>

		<div class="stage">

			<div class="colmask main">
				<div class="col0"></div>
				<div class="col1">
					<div class="content">

						<!--
							@todo
							{block:SearchPage}
							<div class="search">
								{block:SearchResults}
								<h1>{lang:Your search for SearchQuery returned SearchResultCount results 2}</h1>
								{/block:SearchResults}

								{block:NoSearchResults}
								<h1>{lang:No search results for SearchQuery 2}</h1>
								{/block:NoSearchResults}
							</div>
							{/block:SearchPage}
						-->

						<ol class="posts">
							{block:Posts}

							{block:Text}
							<li class="post text">

								{block:Title}
								<h1 class="title">{Title}</h1>
								{/block:Title}

								<div class="body">{Body}</div>

								{block:HasTags}
								<ul class="tags">
									{block:Tags}
									<li><a href="{TagURL}">{Tag}</a></li>
									{/block:Tags}
								</ul>
								{/block:HasTags}

								<div class="meta">
									<div class="clearfix">
										{block:Date}
										<div class="date"><a href="{Permalink}" title="Permanent link to this post">{Year}.{MonthNumberWithZero}.{DayOfMonthWithZero}</a></div>
										{/block:Date}
										<ul class="like_and_reblog_buttons">
											<li>{ReblogButton color="black"}</li>
											<li>{LikeButton color="black"}</li>
										</ul>
									</div>
								</div>

								{block:PostNotes}
								<div class="notes-wrap">{PostNotes}</div>
								{/block:PostNotes}
							</li>
							{/block:Text}

							{block:Quote}
							<li class="post quote">
								<div class="media">
									<div class="body quote">{Quote}</div>

									{block:Source}
									<div class="body quote-source">&mdash; {Source}</div>
									{/block:Source}
								</div>

								{block:HasTags}
								<ul class="tags">
									{block:Tags}
									<li><a href="{TagURL}">{Tag}</a></li>
									{/block:Tags}
								</ul>
								{/block:HasTags}

								<div class="meta">
									<div class="clearfix">
										{block:Date}
										<div class="date"><a href="{Permalink}" title="Permanent link to this post">{Year}.{MonthNumberWithZero}.{DayOfMonthWithZero}</a></div>
										{/block:Date}
										<ul class="like_and_reblog_buttons">
											<li>{ReblogButton color="black"}</li>
											<li>{LikeButton color="black"}</li>
										</ul>
									</div>
								</div>

								{block:PostNotes}
								<div class="notes-wrap">{PostNotes}</div>
								{/block:PostNotes}
							</li>
							{/block:Quote}

							{block:Link}
							<li class="post link">
								<h1 class="title">{Name}</h1>

								<div class="body"><p><a href="{URL}" {Target}>{URL}</a></p></div>

								{block:Description}
								<div class="body">{Description}</div>
								{/block:Description}

								{block:HasTags}
								<ul class="tags">
									{block:Tags}
									<li><a href="{TagURL}">{Tag}</a></li>
									{/block:Tags}
								</ul>
								{/block:HasTags}

								<div class="meta">
									<div class="clearfix">
										{block:Date}
										<div class="date"><a href="{Permalink}" title="Permanent link to this post">{Year}.{MonthNumberWithZero}.{DayOfMonthWithZero}</a></div>
										{/block:Date}
										<ul class="like_and_reblog_buttons">
											<li>{ReblogButton color="black"}</li>
											<li>{LikeButton color="black"}</li>
										</ul>
									</div>
								</div>

								{block:PostNotes}
								<div class="notes-wrap">{PostNotes}</div>
								{/block:PostNotes}
							</li>
							{/block:Link}

							{block:Photo}
							<li class="post photo">
								<div class="media">{LinkOpenTag}<img src="{PhotoURL-500}" alt="{PhotoAlt}" />{LinkCloseTag}</div>

								{block:Caption}
								<div class="body caption">{Caption}</div>
								{/block:Caption}

								{block:HasTags}
								<ul class="tags">
									{block:Tags}
									<li><a href="{TagURL}">{Tag}</a></li>
									{/block:Tags}
								</ul>
								{/block:HasTags}

								<div class="meta">
									<div class="clearfix">
										{block:Date}
										<div class="date"><a href="{Permalink}" title="Permanent link to this post">{Year}.{MonthNumberWithZero}.{DayOfMonthWithZero}</a></div>
										{/block:Date}
										<ul class="like_and_reblog_buttons">
											<li>{ReblogButton color="black"}</li>
											<li>{LikeButton color="black"}</li>
										</ul>
									</div>
								</div>

								{block:PostNotes}
								<div class="notes-wrap">{PostNotes}</div>
								{/block:PostNotes}
							</li>
							{/block:Photo}

							{block:Photoset}
							<li class="post photoset">
								{Photoset-500}

								{block:Caption}
								<div class="body caption">{Caption}</div>
								{/block:Caption}

								{block:HasTags}
								<ul class="tags">
									{block:Tags}
									<li><a href="{TagURL}">{Tag}</a></li>
									{/block:Tags}
								</ul>
								{/block:HasTags}

								<div class="meta">
									<div class="clearfix">
										{block:Date}
										<div class="date"><a href="{Permalink}" title="Permanent link to this post">{Year}.{MonthNumberWithZero}.{DayOfMonthWithZero}</a></div>
										{/block:Date}
										<ul class="like_and_reblog_buttons">
											<li>{ReblogButton color="black"}</li>
											<li>{LikeButton color="black"}</li>
										</ul>
									</div>
								</div>

								{block:PostNotes}
								<div class="notes-wrap">{PostNotes}</div>
								{/block:PostNotes}
							</li>
							{/block:Photoset}

							{block:Audio}
							<li class="post audio">
								{block:AudioEmbed}
								<div class="media">{AudioEmbed-500}</div>
								{/block:AudioEmbed}

								{block:AudioPlayer}
								<div class="media">{AudioPlayerBlack}</div>
								{/block:AudioPlayer}

								{block:Caption}
								<div class="body caption">{Caption}</div>
								{/block:Caption}

								{block:HasTags}
								<ul class="tags">
									{block:Tags}
									<li><a href="{TagURL}">{Tag}</a></li>
									{/block:Tags}
								</ul>
								{/block:HasTags}

								<div class="meta">
									<div class="clearfix">
										{block:Date}
										<div class="date"><a href="{Permalink}" title="Permanent link to this post">{Year}.{MonthNumberWithZero}.{DayOfMonthWithZero}</a></div>
										{/block:Date}
										<ul class="like_and_reblog_buttons">
											<li>{ReblogButton color="black"}</li>
											<li>{LikeButton color="black"}</li>
										</ul>
									</div>
								</div>

								{block:PostNotes}
								<div class="notes-wrap">{PostNotes}</div>
								{/block:PostNotes}
							</li>
							{/block:Audio}

							{block:Video}
							<li class="post video">
								<div class="media">{Video-500}</div>

								{block:Caption}
								<div class="body caption">{Caption}</div>
								{/block:Caption}

								{block:HasTags}
								<ul class="tags">
									{block:Tags}
									<li><a href="{TagURL}">{Tag}</a></li>
									{/block:Tags}
								</ul>
								{/block:HasTags}

								<div class="meta">
									<div class="clearfix">
										{block:Date}
										<div class="date"><a href="{Permalink}" title="Permanent link to this post">{Year}.{MonthNumberWithZero}.{DayOfMonthWithZero}</a></div>
										{/block:Date}
										<ul class="like_and_reblog_buttons">
											<li>{ReblogButton color="black"}</li>
											<li>{LikeButton color="black"}</li>
										</ul>
									</div>
								</div>

								{block:PostNotes}
								<div class="notes-wrap">{PostNotes}</div>
								{/block:PostNotes}
							</li>
							{/block:Video}

							{/block:Posts}
						</ol>

					</div>
				</div>
				<div class="col2">
					<div class="header">
						<ul>
							<li class="logo">
								<span class="square lightblue"></span>
								<a href="/" class="h2 icon-sprite-blog icon-logo" title="Home">Home</a>
							</li>

							<li class="listen">
								<span class="square darkblue"></span>
								<div class="station">
									<div class="h3">Radio</div>
								</div>
								<div class="when">
									<div class="h3">Mondays<br/>2100 SAST</div>
								</div>
								<a href="http://radio.liquidfridge.co.za" target="_blank" class="h3 play"><span class="circle"><span class="icon-sprite-blog icon-play"></span></span><span class="text">Live &amp; Podcast</span></a>
							</li>

							<li class="links">
								<span class="square yellow"></span>
								<ul>
									<li>
										<span class="circle circle-mail"><span class="icon-sprite-blog icon-mail"></span></span>
										<a href="http://eepurl.com/NUxN1" onclick="javascript:popup('http://eepurl.com/NUxN1', '', 650, 600); return false;" target="_blank" class="h3 title">Join mailing list</a>
									</li>
									<li class="social">
										<ul>
											<li><a class="circle" href="https://www.facebook.com/liquidfridge" target="_blank" title="Follow on Facebook"><span class="icon-sprite-blog icon-facebook">Follow on Facebook</span></a></li><li><a class="circle" href="https://twitter.com/liquidfridge" target="_blank" title="Follow on Twitter"><span class="icon-sprite-blog icon-twitter">Follow on Twitter</span></a></li>
										</ul>
									</li>
								</ul>
							</li>

						</ul>
					</div>
				</div>
				<div class="col3"></div>
			</div>

			<div class="colmask klf">
				<div class="col0"></div>
				<div class="col1"></div>
				<div class="col2">
					<div class="speakers-wrap">
						<span class="square lightblue"></span>
						<div class="speakers"></div>
					</div>
				</div>
				<div class="col3"></div>
			</div>

			<div class="colmask footer">
				<div class="col0"></div>
				<div class="col1">
					{block:Pagination}
					<div class="pagination-wrap">
						<ul class="pagination clearfix">
							{block:NextPage}
							<li><a class="h3" href="{NextPage}">« Older</a></li>
							{/block:NextPage}
							{block:PreviousPage}
							<li><a class="h3" href="{PreviousPage}">Newer »</a></li>
							{/block:PreviousPage}
						</ul>
					</div>
					{/block:Pagination}
				</div>
				<div class="col2 colophon">
					<div class="about">
						<a class="h3" href="http://en.wikipedia.org/wiki/Teenage_Kicks#John_Peel" target="_blank">"Teenage dreams, so hard to beat"</a>
					</div>
					<span class="square darkblue"></span>
				</div>
				<div class="col3"></div>
			</div>

		</div>

		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-18229289-1']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</body>
</html>