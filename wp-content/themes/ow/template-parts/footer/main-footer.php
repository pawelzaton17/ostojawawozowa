<div class="js-main-footer-wrapper">
	<footer class="main-footer">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col col-md-auto">
					<span class="main-footer__copyrights">© <?= date('Y').' '.get_bloginfo('name'); ?></span>
				</div>
                <div class="col col-md-auto">
                    <?php get_template_part('template-parts/components/social-icons'); ?>
                </div>
			</div>
		</div>
	</footer>
</div>
