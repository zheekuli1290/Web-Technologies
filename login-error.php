<?php if(isset($_SESSION['loginError'])): ?>
	<div class="alert alert-danger">
		<?php echo $_SESSION['loginError'];?>
		<?php unset($_SESSION['loginError']);?>
	</div>
<?php endif;?>