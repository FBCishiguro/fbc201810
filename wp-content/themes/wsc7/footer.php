<?php /* WordPress CMS Theme WSC Project. */ ?>

<div id="footer">
<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
	<div id="footer-wrap">
		<div id="footer-widget-area">
			<?php 	if ( ! dynamic_sidebar( 'footer-widget-area' ) ) : ?>
			<?php endif; ?>
		</div>
		<div class="clear"><hr /></div>
	</div>
<?php endif; ?>			
</div>

			

<div id="footer-bottom">
	<p></p>
	<div id="copyright">
		Address: August-Schanz Str. 8, 60433 Frankfurt/M, Germany<br>TEL: 0049-69-5480950
		<br>Copyright © 2018 FBC Business Consulting GmbH. All Rights Reserved.</a>
	</div>
</div>

</div>
    <script>
      var navigation = responsiveNav("newest_letters_mb", {customToggle: ".nav-toggle"});
    </script>
    <script>
      var navigation = responsiveNav("loginform_mb", {customToggle: ".loginform-toggle"});
    </script>
</body>
</html>