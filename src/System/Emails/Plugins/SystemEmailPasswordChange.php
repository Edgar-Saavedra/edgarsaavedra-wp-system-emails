<?php


namespace Custom\Plugins\CustomSystemEmails\System\Emails\Plugins
{
  use Custom\Plugins\CustomSystemEmails\System\Emails\SystemEmailsPlugin;

  class SystemEmailPasswordChange implements SystemEmailsPlugin
  {

    private $template_local;

    public function __construct()
    {
      $this->init();
    }

    /**
     * Initialize the filter and set other important data
     * @throws \Exception
     */
    function init()
    {
      $this->setTemplate(\Custom\Plugins\CustomSystemEmails\Helpers\Helpers::getPluginPath() .'templates/emails/password-change/template.php');
      $this->add_filter();
    }

    function add_filter()
    {
//      password_change_email
      add_filter( 'retrieve_password_message', array($this,'filter'),10,4 );
    }

    /**
     * See : https://developer.wordpress.org/reference/functions/retrieve_password/
     * SEE: https://developer.wordpress.org/reference/hooks/password_change_email/
     * SEE: https://developer.wordpress.org/reference/functions/wp_update_user/
     * @param $m
     * @param $user
     * @param $userdata
     * @return mixed
     */
    function filter($m, $key, $user, $user_data)
    {
      //some of this was copied from retrieve_password() in wp-login.php
      $user_login = $user_data->user_login;
      $user_email = $user_data->user_email;
      $key = get_password_reset_key( $user_data );

      if ( is_wp_error( $key ) ) {
        return $key;
      }
      $message = __('Someone has requested a password reset for the following account:') . "\r\n\r\n";
      $message .= network_home_url( '/' ) . "\r\n\r\n";
      $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
      $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
      $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
      $message .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

      ob_start();
      include($this->getTemplate());
      return ob_get_clean();
    }

    function setTemplate($str)
    {
      $this->template_local = $str;
    }
    function getTemplate()
    {
      return $this->template_local;
    }
  }
}