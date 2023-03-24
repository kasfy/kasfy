<main>
	<h2>Welcome to <?=Config::APP_NAME ?></h2>
	<?php if (!$DATA['user']): ?>
	<p>Not logged in.</p>
	<?php else: ?>
	<p>Hi, <?= Security::escape($DATA['user']); ?>!</p>
	<?php endif; ?>
</main>
