<?php

/**
 * Morfy Contact Plugin
 *
 * (c) Romanenko Sergey / Awilum <http://morfy.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

include 'lib/PHPMailer.php';

class Contact
{
    public static function form($recipient = '')
    {
        $fenom = Fenom::factory(
            PLUGINS_PATH . '/contact/templates/',
            CACHE_PATH . '/fenom/',
            Morfy::$fenom
        );

        empty($recipient) and $recipient = Morfy::$site['author']['email'];
        $status_error = '';

        if (Request::post('submit')) {
            if (Token::check(Request::post('csrf'))) {
                $email    = (Request::post('email')) ? Request::post('email') : Morfy::$plugins['contact']['reply_to'] ;
                $subject  = (Request::post('subject')) ? Request::post('subject') : Morfy::$plugins['contact']['subject'] ;

                $mail = new PHPMailer();
                $mail->CharSet = 'utf-8';
                $mail->ContentType = 'text/html';
                $mail->SetFrom($email);
                $mail->AddReplyTo($email);
                $mail->AddAddress($recipient);
                $mail->Subject = $subject;

                Arr::delete($_POST, 'csrf');
                Arr::delete($_POST, 'submit');

                $mail->MsgHTML($fenom->fetch('email.tpl', array('fields' => $_POST)));

                if ($mail->Send()) {
                    if (Morfy::$plugins['contact']['result_page']) {
                        Request::redirect(Morfy::$site['url'] . '/' . Morfy::$plugins['contact']['result_page']);
                    } else {
                        Request::redirect(Url::getCurrent());
                    }
                } else {
                    $status_error = Morfy::$plugins['contact']['status_error_msg'];
                }
            } else {
                die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
            }
        }

        $fenom->display('form.tpl', array('fields'  => Morfy::$plugins['contact']['fields'],
                                          'buttons' => Morfy::$plugins['contact']['buttons'],
                                          'status_error' => $status_error));
    }
}
