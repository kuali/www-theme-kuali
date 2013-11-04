<header>
	<div id="header-content">
		<h1><a href="/"><span>Kuali Foundation</span></a></h1>
		<div id="tagline"><span class="tag">Software solutions for higher education</span></div>
		<nav>
			<?php if ($page['menu_main']): ?>
 			<?php print render($page['menu_main']); ?>
 			<?php endif; ?>
		</nav>
		<div id="search">
			<ul id="search-options">
				<li>
					<input type="radio" name="search-scope" id="search-scope-projects" class="search-option" value="projects">
					<label for="search-scope-projects">Projects</label>
				</li>
				<li>
					<input type="radio" name="search-scope" checked="checked" id="search-scope-kuali" class="search-option" value="kuali">
					<label for="search-scope-kuali">Kuali.org</label>
				</li>
			</ul>
			<?php if ($page['menu_top']): ?>
<?php print render($page['menu_top']); ?>
<?php endif; ?>
		</div>
	</div>
</header>