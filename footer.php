		<div id="message-app">
			<?php
				loadTemplate('messenger/icon');
				loadTemplate('messenger/section');
			?>
		</div>
	</body>
	<?php
	// load scripts
	App\Loaders\ScriptLoader::initScripts(App\Loaders\ScriptLoader::FOOTER);
	?>
</html>