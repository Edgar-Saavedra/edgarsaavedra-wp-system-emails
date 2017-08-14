<?php

namespace Custom\Plugins\CustomSystemEmails	{

	use Custom\Plugins\CustomSystemEmails\Frontend\Assets;
	use Custom\Plugins\CustomSystemEmails\Helpers\Helpers;
	use Custom\Plugins\CustomSystemEmails\System\Emails\SystemEmails;

	class Load
	{
		function __construct()
		{
			$this->init();
		}
		private function init()
		{
			//load our frontend assets
			(new Assets())->init();
			(new SystemEmails())->init();

			// Bring our rest interface online, example only.
			// new Rest();
		}
		/**
			* Plugin activation hook
			*/
		public function activate() {
		}

		/**
			* Plugin deactivation hook
			*/
		public function deactivate() {
		}
	}
}