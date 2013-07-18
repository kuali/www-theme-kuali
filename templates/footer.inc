<div id="footer-outer-wrapper">
<div id="footer-spacer"></div>
	<div id="footer-inner-wrapper">
		<div id="footer-content">
			<div id="footer-menu">
			<ul>
			<li><a href="/">Home</a>
				<?php if ($page['footer_right_menu_home']): ?>
				<?php print render($page['footer_right_menu_home']); ?>
				<?php endif; ?>
			</li>
			<li><a href="/software">Software</a>
				<?php if ($page['footer_right_menu_software']): ?>
				<?php print render($page['footer_right_menu_software']); ?>
				<?php endif; ?>
			</li>
			<li><a href="/community">Community</a>
				<?php if ($page['footer_right_menu_community']): ?>
				<?php print render($page['footer_right_menu_community']); ?>
				<?php endif; ?>
			</li>
			<li><a href="/join">Join</a>
				<?php if ($page['footer_right_menu_join']): ?>
				<?php print render($page['footer_right_menu_join']); ?>
				<?php endif; ?>
			</li>
			</ul>
			</ul>
			</div>
			<div id="footer-contact">
				<?php if ($page['footer_left']): ?>
				<?php print render($page['footer_left']); ?>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="copyright-wrapper">
			<div id="copyright">
			<?php if ($page['footer_copyright']): ?>
			<?php print render($page['footer_copyright']); ?>
			<?php endif; ?>
			</div>
		</div>
</div>