<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="this.classList.add('hidden');">&times;</button>
	<strong>Error!</strong> <?= $message ?>
</div>