<?php

namespace Custom\Plugins\CustomSystemEmails\System\Emails
{
	interface SystemEmailsPlugin
	{
		function init();
		function add_filter();
		function setTemplate($str);
		function getTemplate();
	}
}