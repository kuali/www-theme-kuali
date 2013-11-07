<footer id="footer-outer-wrapper">
	<div id="footer-inner-wrapper">
		<div id="footer-content">
			<div id="footer-menu">
			<ul>
			<li><h6>Products</h6>
				<?php if ($page['footer_right_menu_col_1']): ?>
				<?php print render($page['footer_right_menu_col_1']); ?>
				<?php endif; ?>
			</li>
			<li><h6>Foundation</h6>
				<?php if ($page['footer_right_menu_col_2']): ?>
				<?php print render($page['footer_right_menu_col_2']); ?>
				<?php endif; ?>
			</li>
			<li><h6>Support</h6>
				<?php if ($page['footer_right_menu_col_3']): ?>
				<?php print render($page['footer_right_menu_col_3']); ?>
				<?php endif; ?>
			</li>
			<li><h6>Get Started</h6>
				<?php if ($page['footer_right_menu_col_4']): ?>
				<?php print render($page['footer_right_menu_col_4']); ?>
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
</footer>