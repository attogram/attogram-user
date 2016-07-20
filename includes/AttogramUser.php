<?php
// Attogram Framework - User Module - AttogramUser class v0.1.8

namespace Attogram;

/**
 * Attogram User Object Interface
 */
interface AttogramUserInterface
{

    public static function login($psr3LoggerObject, $databaseObject);

    public static function logout();

    public static function isLoggedIn();
}

/**
 * A very simple user system, with very minimal security.
 * Not recommended for production environment
 */
class AttogramUser implements AttogramUserInterface
{

    /**
     * login a user into the system
     * @param  obj   $log       PSR-3 compliant logger, interface: \Psr\Log\LoggerInterface
     * @param  obj   $database  The attogram database, interface: \Attogram\AttogramDatabaseInterface
     * @return bool
     */
    public static function login(\Psr\Log\LoggerInterface $log, \Attogram\AttogramDatabaseInterface $database)
    {
        if (!isset($_POST['u']) || !isset($_POST['p']) || !$_POST['u'] || !$_POST['p']) {
            $log->error('LOGIN: missing username or password');
            return false;
        }
        $bind[':u'] = $_POST['u'];
        $bind[':p'] = $_POST['p'];
        $user = $database->query(
            'SELECT id, username, level, email FROM user WHERE username = :u AND password = :p',
            $bind
        );
        // query failed
        if (!$database->database || $database->database->errorCode() != '00000') {
            $log->error('LOGIN: Login system offline');
            return false;
        }
        // no user, or wrong password
        if (!$user) {
            $log->error('LOGIN: Invalid login');
            return false;
        }
        // corrupt data
        if (!sizeof($user) == 1) {
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
    public static function isLoggedIn()
    {
        if (
            isset($_SESSION['attogram_id'])
            && $_SESSION['attogram_id']
            && isset($_SESSION['AttogramUsername'])
            && $_SESSION['AttogramUsername']
        ) {
            return true;
        }
        return false;
    }
} // end class AttogramUser
