<?php
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

function str_limit_words(string $string, int $limit, string $pointer = "..."): string



