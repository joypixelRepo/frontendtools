<?php
class User extends ApplicationController {

  private $db;
  private $sessionUser;
  private $sessionUserId;

  public function __construct() {
    $this->db = new Db();
    $this->sessionUser = isset($_SESSION['user']['user']) ? $_SESSION['user']['user'] : null;
    $this->sessionUserId = isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : null;
  }

  public function sign_in($user, $password) {
    $sql = 'SELECT * FROM login WHERE user = ? AND password = ? AND active = ?';
    $vars = [$user, self::encrypt($password), 1];
    $res = $this->db->query($sql, $vars)->fetch(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  public function sign_in_cookie($user, $password) {
    $sql = 'SELECT * FROM login WHERE user = ? AND password = ? AND active = ?';
    $vars = [$user, $password, 1];
    $res = $this->db->query($sql, $vars)->fetch(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  public function sign_up() {
    $sql = 'INSERT INTO login SET user = ?, job = ?, github = ?, email = ?, password = ?, name = ?, image = ?, rol = ?, active = ?';
    $vars = [$_POST['user'], $_POST['job'], $_POST['github'], $_POST['email'], self::encrypt($_POST['password']), $_POST['full-name'], $_POST['avatar'], 'user', 0];
    $res = $this->db->query($sql, $vars)->rowCount();

    if($res == 1) {
      self::sendActivationEmail($_POST['user'], $_POST['full-name'], $_POST['email']);
      return true;
    }
  }

  public function deleteAccount() {
    $sql = 'DELETE FROM comments WHERE comment_user_id = ?';
    $vars = [$_SESSION['user']['user_id']];
    $res = $this->db->query($sql, $vars);

    $sql = 'DELETE FROM entries WHERE creator = ?';
    $vars = [$_SESSION['user']['user']];
    $res = $this->db->query($sql, $vars);

    $sql = 'DELETE FROM login WHERE user_id = ?';
    $vars = [$_SESSION['user']['user_id']];
    $res = $this->db->query($sql, $vars)->rowCount();

    if($res) {
      return $res;
    }
  }

  private function sendActivationEmail($user, $name, $email) {
    $cred = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config/email.ini', true);

    $config = [
      'email'     => $cred['email'],
      'name'      => $cred['name'],
    ];

    $to = $email;
    $subject = 'Activar cuenta en Frontendtools';

    $message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
      <title>Activar cuenta en Frontendtools</title>
      <style type="text/css">

        #outlook a {padding:0;}
        body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
        .ExternalClass {width:100%;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
        #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
        img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
        a img {border:none;display:inline-block;}
        .image_fix {display:block;}
        
        h1, h2, h3, h4, h5, h6 {color: black !important;}

        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

        h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
          color: red !important; 
        }

        h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
          color: purple !important; 
        }

        table td {border-collapse: collapse;}

        table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

        a {color: #000;}

        @media only screen and (max-device-width: 480px) {

          a[href^="tel"], a[href^="sms"] {
            text-decoration: none;
            color: black; /* or whatever your want */
            pointer-events: none;
            cursor: default;
          }

          .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
            text-decoration: default;
            color: orange !important; /* or whatever your want */
            pointer-events: auto;
            cursor: default;
          }
        }


        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
          a[href^="tel"], a[href^="sms"] {
            text-decoration: none;
            color: blue; /* or whatever your want */
            pointer-events: none;
            cursor: default;
          }

          .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
            text-decoration: default;
            color: orange !important;
            pointer-events: auto;
            cursor: default;
          }
        }

        p {
          margin:0;
          color:#555;
          font-family:Helvetica, Arial, sans-serif;
          font-size:16px;
          line-height:160%;
        }
        a.link2{
          text-decoration:none;
          font-family:Helvetica, Arial, sans-serif;
          font-size:20px;
          color:#fff;
          border-radius:4px;
        }
        h2{
          color:#181818;
          font-family:Helvetica, Arial, sans-serif;
          font-size:22px;
          font-weight: normal;
        }

        .bgItem{
          background:#F4A81C;
        }
        .bgBody{
          background:#ffffff;
        }

      </style>

    <script type="colorScheme" class="swatch active">
      {
        "name":"Default",
        "bgBody":"ffffff",
        "link":"f2f2f2",
        "color":"555555",
        "bgItem":"F4A81C",
        "title":"181818"
      }
    </script>

    </head>
    <body>
      <!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
      <table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class=\'bgBody\'>
        <tr>
          <td>

            <!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->

            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border-collapse:collapse;">
              <tr>
                <td class=\'movableContentContainer\'>
                  
                  <div class=\'movableContent\'>
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
                      <tr height="40">
                        <td width="200">&nbsp;</td>
                        <td width="200">&nbsp;</td>
                        <td width="200">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="200" valign="top">&nbsp;</td>
                        <td width="200" valign="top" align="center">
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" style="background: #263238;padding: 15px;box-shadow: 0 16px 38px -12px rgba(0,0,0,0.56), 0 4px 25px 0px rgba(0,0,0,0.12), 0 8px 10px -5px rgba(0,0,0,0.2);border-radius: 6px;">
                              <img src="https://frontendtools.net/assets/images/frontendtools-logo-desktop.svg" width="255" alt=\'Logo\'  data-default="placeholder" />
                            </div>
                          </div>
                        </td>
                        <td width="200" valign="top">&nbsp;</td>
                      </tr>
                      <tr height="25">
                        <td width="200">&nbsp;</td>
                        <td width="200">&nbsp;</td>
                        <td width="200">&nbsp;</td>
                      </tr>
                    </table>
                  </div>

                  <div class=\'movableContent\'>
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
                      <tr>
                        <td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" >
                              <h2>Activar cuenta en Frontendtools</h2>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td width="100">&nbsp;</td>
                        <td width="500" align="center" style="padding-bottom:5px;">
                          <div class="contentEditableContainer contentTextEditable">
                            <div class="contentEditable" >
                              <p>Hola '.$name.'.</p>
                              <p>&nbsp;</p>
                              <p>Te has registrado satisfactoriamente en <a href="https://frontendtools.net">frontendtools</a>, pero es necesaria la activación del usuario para poder acceder.</p>
                              <p>&nbsp;</p>
                              <p>Haz click en el siguiente botón para activar tu cuenta:</p>
                            </div>
                          </div>
                        </td>
                        <td width="100">&nbsp;</td>
                      </tr>
                    </table>
                  </div>

                  <div class=\'movableContent\'>
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
                      <tr>
                        <td width="100">&nbsp;</td>
                        <td width="500" align="center" style="padding-top:25px;padding-bottom:115px;">
                          <table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
                            <tr>
                              <td bgcolor="#ffc100" align="center" style="border-radius:4px;" width="200" height="50">
                                <div class="contentEditableContainer contentTextEditable">
                                  <div class="contentEditable" >
                                    <a target=\'_blank\' href="https://'.$_SERVER['SERVER_NAME'].'/user/activate?user='.$user.'&code='.self::activationCode($user).'" class=\'link2\'>Activar mi cuenta</a>
                                  </div>
                                </div>

                              </td>
                            </tr>
                          </table>
                        </td>
                        <td width="100">&nbsp;</td>
                      </tr>
                    </table>
                  </div>

                </td>
              </tr>
            </table>
    <!-- END BODY -->

          </td>
        </tr>
      </table>
      <!-- End of wrapper table -->
    </body>
    </html>
    ';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    // Cabeceras adicionales
    $headers .= 'To: '.$name.' <'.$email.'>' . "\r\n";
    $headers .= 'From: '.$config['name'].' <'.$config['email'].'>' . "\r\n";
    $headers .= 'Reply-To: '.$config['email'] . "\r\n";
    //$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
    //$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

    if(mail($to, $subject, $message, $headers)) {
      self::sendCopyEmail($user, $name, $email, $config);
    }
  }

  private function sendCopyEmail($user, $name, $email, $config) {
    $message = '
    <html>
    <head>
      <title>Registro en Frontendtools</title>
    </head>
    <body>
      <h3>Un nuevo usuario se ha registrado en Frontendtools</h3>
      <p>Nombre: '.$name.'</p>
      <p>Nombre usuario: '.$user.'</p>
      <p>Email: '.$email.'</p>
    </body>
    </html>
    ';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    // Cabeceras adicionales
    $headers .= 'To: '.$config['name'].' <'.$config['email'].'>' . "\r\n";
    $headers .= 'From: '.$config['name'].' <'.$config['email'].'>' . "\r\n";
    $headers .= 'Reply-To: '.$config['email'] . "\r\n";
    //$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
    //$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

    $to = $config['email'];
    $subject = 'Registro en Frontendtools';

    mail($to, $subject, $message, $headers);
  }

  public function activateUser($user, $activationCode) {
    if($activationCode == self::activationCode($user)) {
      $sql = 'UPDATE login SET active = ? WHERE user = ?';

      $vars = [1, $user];
      $res = $this->db->query($sql, $vars);

      if($res) {
        return true;
      }
    }
  }

  private function activationCode($user) {
    $salt = 'jka¡HS_dg234ah2';
    return hash('sha256', $user.$salt);
  }

  public function setLastConnection() {
    date_default_timezone_set('Europe/Madrid');
    $sql = 'UPDATE login SET last_connection = ? WHERE user = ?';
    $vars = [strftime('%Y-%m-%d %H:%M:%S'), self::getUserData()['user']];
    $res = $this->db->query($sql, $vars);
  }

  public function changeImage() {
    if(file_exists($_SERVER['DOCUMENT_ROOT'].$_GET['image'])) {
      $sql = 'UPDATE login SET image = ? WHERE user = ?';
      $vars = [$_GET['image'], self::getUserData()['user']];
      $res = $this->db->query($sql, $vars)->rowCount();

      if($res == 1) {
        echo 'ok';
      }
    } else {
      echo 'no_image';
    }
  }

  public function getUserData() {
    $sql = 'SELECT * FROM login WHERE user = ?';
    $vars = [$this->sessionUser];
    $res = $this->db->query($sql, $vars)->fetch(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  public function getUsers() {
    $sql = 'SELECT * FROM login ORDER BY last_connection DESC LIMIT 5';
    $res = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    if($res) {
      return $res;
    }
  }

  private function encrypt($password) {
    $salt = '92?8K37yrtQUysdf2*91qq';
    return hash('sha256', $password.$salt);
  }

  public function entryBelongsToTheUser($entryId) {
    $sql = 'SELECT entries.id FROM entries INNER JOIN login ON entries.creator = login.user WHERE login.user = ? AND (entries.id = ? OR login.rol = ?)';
    $vars = [$this->sessionUser, $entryId, 'admin'];
    $res = $this->db->query($sql, $vars)->rowCount();
    if($res == 0) {
      parent::notify('error', 'Acceso denegado', 'No tienes permisos para la acción que quieres realizar.', '/');
      die;
    }
  }

  public function commentBelongsToTheUser($commentId) {
    if(self::isAdmin()) {
      $res = 1;
    } else {
      $sql = 'SELECT comments.comment_id FROM comments INNER JOIN login ON comments.comment_user_id = login.user_id WHERE comments.comment_user_id = ? AND comments.comment_id = ?';
      $vars = [$this->sessionUserId, $commentId];
      $res = $this->db->query($sql, $vars)->rowCount();
    }

    if($res == 0) {
      parent::notify('error', 'Acceso denegado', 'No tienes permisos para la acción que quieres realizar.', '/');
      die;
    }
  }

  public function isAdmin() {
    $sql = 'SELECT * FROM login WHERE user = ? AND rol = ?';
    $vars = [$this->sessionUser, 'admin'];
    $res = $this->db->query($sql, $vars)->rowCount();
    return $res;
  }

  public function userExist() {
    $sql = 'SELECT * FROM login WHERE user = ?';
    $vars = [$_GET['user']];
    $res = $this->db->query($sql, $vars)->rowCount();
    if($res > 0) {
      echo 1;
      return true;
    }
  }

  public function emailExist() {
    $sql = 'SELECT * FROM login WHERE email = ?';
    $vars = [$_GET['email']];
    $res = $this->db->query($sql, $vars)->rowCount();
    if($res > 0) {
      echo 1;
      return true;
    }
  }

  public function __destruct() {
    
  }
}
