<?php
session_start();
session_unset();
session_destroy();
			echo '<script>
					confirm("Are you sure you want to logout?");

					</script>';
header("location:home.php");
exit;
?>
<script>confirm('Are you sure to logout?');</script>