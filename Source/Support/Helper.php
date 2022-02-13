<?php
/**
 * ###################
 * ###  VALIDATE  ###
 * ###################
 */

use Source\Core\Connect;
use Source\Core\Message;
use Source\Core\Session;
use Source\Models\User;


/**
 * @param string $email
 * @return bool
 */
function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $password
 * @return bool
 */
function is_passwd(string $password): bool
{
    return (mb_strlen($password) >= CONFIG_PASSWD_MIN_LEN &&
                            mb_strlen($password) <=
                            CONFIG_PASSWD_MAX_LEN ? true : false);
}

function passwd(string $password): string
{
    return password_hash($password,CONFIG_PASSWD_ALGO,CONFIG_PASSWD_OPTION);
}

function passwd_verify(string $password, string $hash): bool
{
    return password_verify($password, $hash);
}

function passwd_rehash(string $hash): bool
{
    return password_needs_rehash($hash,CONFIG_PASSWD_ALGO,CONFIG_PASSWD_OPTION);
}

/**
 * ################
 * ###  STRING  ###
 * ################
 */
/**
 * @param string $string
 * @return string
 */
function str_slug(string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    $slug = str_replace(["-----", "----", "---", "--"], "-",
        str_replace([" "], "-",
            trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
        )
    );

    return  $slug;
}

function str_study_case(string $string): string
{
    $string = str_slug($string);
    $studlyCase = str_replace(" ", "",
        mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE)
    );

    return $studlyCase;
}

function str_camel_case(string $string): string
{
    return lcfirst(str_study_case($string));
}

function str_title(string $string): string
{
    return str_convert_filter_var_case($string, FILTER_SANITIZE_SPECIAL_CHARS, MB_CASE_TITLE);
}

function str_convert_filter_var_case(string $string, int $modeFilter, int $modeConvertCase) {
    return mb_convert_case(filter_var($string, $modeFilter), $modeConvertCase);
}

function str_limit_words(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);

    if ($numWords < $limit)
        return $string;

    $words = implode(" ", array_splice($arrWords, 0, $limit));

    return  "{$words}{$pointer}";
}

function str_limit_char(string $string, int $limit, string $pointer = "..."): string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if (mb_strlen($string) <= $limit){
        return $string;
    }

    $chars = mb_substr($string,0,mb_strrpos(mb_substr($string, 0, $limit), " "));

    return "{$chars}{$pointer}";
}

/**
 * ################
 * ###  STRING  ###
 * ################
 */

/**
 * @param string $path
 * @return string
 */
function url(string $path): string
{
    return CONFIG_URL_BASE . "/" . ($path[0] == "/" ?
            mb_substr($path, 1) : $path);
}

/**
 * ################
 * ###  STRING  ###
 * ################
 */

/**
 * @param string $url
 */
function redirect(string $url): void
{
    //header("Location: https://www.php.net/manual/pt_BR/function.header.php");
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    $location = url($url);
    header("Location: {$location}");
    exit;
}

/**
 * ################
 * ###  CORE  ###
 * ################
 */

/**
 * @return PDO
 */

function db(): PDO {
    return Connect::getInstance();
}

/**
 * @return Message
 */
function message(): Message {
    return new Message();
}

/**
 * @return Session
 */
function session(): Session {
    return new Session();
}

function csrf_input(): string {
    session()->csrf();
    return "<input type='hidden'  name='csrf' value='" . (session()->csrf_token ?? ""). "'>";
}

/**
 * @param $request
 * @return bool
 */
function csrf_verify($request): bool {
    if(empty(session()->csrf_token) || empty($request['csrf']) ||
        $request['csrf'] != session()->csrf_token)
        return false;

    return true;

}



/**
 * ################
 * ###  MODEL  ###
 * ################
 */

/**
 * @return User
 */
function user(): User {
    return new User();
}



