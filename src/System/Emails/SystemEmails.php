<?php

namespace Custom\Plugins\CustomSystemEmails\System\Emails
{

	use Custom\Plugins\CustomSystemEmails\System\Emails\Plugins\SystemEmailPasswordChange;

	class SystemEmails
	{
		function __construct() {
			$this->init();
		}

		function init()
		{
			$this->wp_mail_content_type();
			(new SystemEmailPasswordChange())->init();
		}

		function wp_mail_content_type()
		{
			add_filter('wp_mail_content_type',array($this,'set_content_type'));
		}

		function set_content_type()
		{
			return 'text/html';
		}
	}
}