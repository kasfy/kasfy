<main>
	<h2>Welcome to <?=Config::APP_NAME ?></h2>
	<?php if (!$DATA['user']): ?>
	<p>Not logged in.</p>
	<?php else: ?>
	<p>Hi, <?= Security::escape($DATA['user']); ?>!</p>
	<?php endif; ?>
</main>



<!--__________________________________________
/*	______ __             ________        
/*	___  //_/_____ __________  __/____  __
/*	__  ,<  _  __ `/_  ___/_  /_ __  / / /
/*	_  /| | / /_/ /_(__  )_  __/ _  /_/ / 
/*	/_/ |_| \__,_/ /____/ /_/    _\__, /  
/*	                             /____/   🔰 𝟣.𝟢 */ -->
