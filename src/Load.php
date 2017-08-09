<?php

namespace Custom\Plugins\CustomSystemEmails	{

	use Custom\Plugins\CustomSystemEmails\Frontend\Assets;
	use Custom\Plugins\CustomSystemEmails\Helpers\Helpers;

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