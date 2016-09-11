<div class="footer-container">
	<footer class="">
		© sREPS 2016
			<?php
                if (isset($_SESSION['email'])) {
                    echo ' | '.$_SESSION['email'];
                }
            ?>
	</footer>
</div>
