<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<ul class="pagination">
	  <?php echo $presenter->render(); ?>
	</ul>

	<!--<div class="pagination">
		<ul class = "nav navbar-nav">
			<?php echo $presenter->render(); ?>
		</ul>
	</div>-->
<?php endif; ?>