<div id="header-wrapper">
<div id="header-inner-wrapper">
</div>
 <div id="header-content">
 	<?php if ($logo): ?>
 	<div id="logo">
 		<h1><a href="/" title="Kuali Foundation" class="header"><span>Kuali Foundation</span></a></h1>
 	</div>
 	<?php endif; ?>
 	<div id="tagline">
		<span class="tag">Quality open source software &mdash; for higher education, by higher education</span>
 	</div>
<div id="top-secondary-wrapper">
<div id="top-secondary-nav">
<ul>
<li class="first" id="search">
<div id="search-icon"></div>
<a href="#">Search</a>
<div id="search-wrapper">
<div id="search-arrow"></div>
<div id="search-area">
<div id="search-inner">
<?php /* <span class="search-title">Search Kuali</span> */ ?>
<?php if ($page['menu_top']): ?>
<?php print render($page['menu_top']); ?>
<?php endif; ?>
</div>
</div>
</div>
</li>
<li><a href="/contact">Contact</a></li>
<li><a href="https://kis.kuali.org">Find People</a></li>
</ul>
</div>
</div>
<div id="about-wrapper">
<div id="about-inner-wrapper">
<?php
if (!empty($node_content['field_uses_subtheme']['#items']['0']['value']) && $node_content['field_uses_subtheme']['#items']['0']['value'] == '1'){
print '<a href="/">';
} else{ print '<a href="#">';}
?>
<div id="about-logo"></div>
<div id="about-logo-hover"></div>
<div id="text">
<div id="kuali-main">
<span class="about">What is</span>
<span class="kuali">Kuali?</span>
</div>
<div id="kuali-subtheme">
<span class="kuali">Kuali</span>
<span class="about">home</span>
</div>
</div>
</a>
<div id="about-tagline">
<div id="about-tagline-text">
<p>"Kuali" is a Malaysian word that refers to a cooking utensil &mdash; essentially a small wok &mdash; that is often described as a humble, but essential tool.</p>
<p class="learn-more"><a href="/about">Learn more about <span>the Kuali Foundation</span></a></p>
</div>
</div>
</div>
</div>
 	<div id="nav">
 		<ul>
 			<li id="software"><a href="/software" class="tab-main">Software</a>
 			<div id="software-list" class="tier-2-nav">
 			
 			<a href="/software" class="nav-area-link"><span>Kuali Software</span></a>
 			<?php if ($page['menu_main_software']): ?>
 			<?php print render($page['menu_main_software']); ?>
 			<?php endif; ?>
 			<div class="clear"></div>
 			</div>
 			</li>
 			<li id="community"><a href="/community" class="tab-main">Community</a>
 			<div id="community-list" class="tier-2-nav">
 			<a href="/community" class="nav-area-link"><span>Community</span></a>
 			<?php if ($page['menu_main_community']): ?>
 			<?php print render($page['menu_main_community']); ?>
 			<?php endif; ?>
 			</div>
 			</li>
 			<li class="last" id="join"><a href="/join" class="tab-main">Join</a>
 			<div id="join-list" class="tier-2-nav">
 			<a href="/join" class="nav-area-link left"><span>Join Kuali</span></a>
 			<?php if ($page['menu_main_join']): ?>
 			<?php print render($page['menu_main_join']); ?>
 			<?php endif; ?>
 			<div class="clear"></div>
 			</div>
 			</li>
 		</ul>
 	</div>
 </div>
</div>