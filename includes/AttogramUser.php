<?php // Attogram Framework - User Module - AttogramUser class v0.1.6

namespace Attogram;

/**
 * Attogram User Object Interface
 */
interface AttogramUserInterface {

  public static function login( $psr3LoggerObject, $databaseObject );

  public static function logout();

  public static function is_logged_in();

}

/**
 * A very simple user system, with very minimal security.
 * Not recommended for production environment
 */
class AttogramUser implements AttogramUserInterface
{

  /**
   * login a user into the system
   * @param  obj   $log       PSR-3 compliant logger object
   * @param  obj   $database  The attogram database object
   * @return bool
   */
  public static function login( $log, $database )
  {
    if( !isset($_POST['u']) || !isset($_POST['p']) || !$_POST['u'] || !$_POST['p'] ) {
      $log->error('LOGIN: missing username or password');
      return false;
    }
    $bind[':u'] = $_POST['u'];
    $bind[':p'] = $_POST['p'];
    $user = $database->query('SELECT id, username, level, email FROM user WHERE username = :u AND password = :p', $bind );

    if( $database->database->errorCode() != '00000' ) { // query failed
      $log->error('LOGIN: Login system offline');
      return false;
    }
    if( !$user ) { // no user, or wrong password
      $log->error('LOGIN: Invalid login');
      return false;
    }
    if( !sizeof($user) == 1 ) { // corrupt data
      $log->error('LOGIN: Login system error');
      return false;
    }
    $user = $user[0];
    $_SESSION['attogram_id'] = $user['id'];
    $_SESSION['AttogramUsername'] = $user['username'];
    $_SESSION['attogram_level'] = $user['level'];
    $_SESSION['attogram_email'] = $user['email'];
    $log->debug('LOGIN: User Logged in');
    return true;
  }

  /**
   * logout a user
   */
  public static function logout()
  {
    session_unset();
    session_destroy();
    session_start();
  }

  /**
   * is a user logged into the system?
   * @return bool
   */
  public static function is_logged_in( )
  {
    if( isset($_SESSION['attogram_id']) && $_SESSION['attogram_id'] && isset($_SESSION['AttogramUsername']) && $_SESSION['AttogramUsername']) {
      return true;
    }
    return false;
  }

} // end class AttogramUser
