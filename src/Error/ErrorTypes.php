<?php
/**
 * @author Juriy Panasevich <panasevich@worksolutions.ru>
 */

namespace JuriyPanasevich\BugsBunny\Error;


class ErrorTypes {
    private static $ERROR_TYPES = [
        E_ERROR => [
            'name' => 'PHP Fatal Error',
            'level' => Error::LEVEL_ERROR,
        ],
        E_WARNING => [
            'name' => 'PHP Warning',
            'level' => Error::LEVEL_WARNING,
        ],
        E_PARSE => [
            'name' => 'PHP Parse Error',
            'level' => Error::LEVEL_ERROR,
        ],
        E_NOTICE => [
            'name' => 'PHP Notice',
            'level' => Error::LEVEL_INFO,
        ],
        E_CORE_ERROR => [
            'name' => 'PHP Core Error',
            'level' => Error::LEVEL_ERROR,
        ],
        E_CORE_WARNING => [
            'name' => 'PHP Core Warning',
            'level' => Error::LEVEL_WARNING,
        ],
        E_COMPILE_ERROR => [
            'name' => 'PHP Compile Error',
            'level' => Error::LEVEL_ERROR,
        ],
        E_COMPILE_WARNING => [
            'name' => 'PHP Compile Warning',
            'level' => Error::LEVEL_WARNING,
        ],
        E_USER_ERROR => [
            'name' => 'User Error',
            'level' => Error::LEVEL_ERROR,
        ],
        E_USER_WARNING => [
            'name' => 'User Warning',
            'level' => Error::LEVEL_WARNING,
        ],
        E_USER_NOTICE => [
            'name' => 'User Notice',
            'level' => Error::LEVEL_INFO,
        ],
        E_STRICT => [
            'name' => 'PHP Strict',
            'level' => Error::LEVEL_INFO,
        ],
        E_RECOVERABLE_ERROR => [
            'name' => 'PHP Recoverable Error',
            'level' => Error::LEVEL_ERROR,
        ],
        8192 => [
            'name' => 'PHP Deprecated',
            'level' => Error::LEVEL_INFO,
        ],
        16384 => [
            'name' => 'User Deprecated',
            'level' => Error::LEVEL_INFO,
        ],
    ];

    public static function isFatal($code) {
        return self::getLevel($code) == Error::LEVEL_ERROR;
    }

    public static function getName($code) {
        if (array_key_exists($code, self::$ERROR_TYPES)) {
            return self::$ERROR_TYPES[$code]['name'];
        } else {
            return 'Unknown';
        }
    }

    public static function getLevel($code) {
        if (array_key_exists($code, self::$ERROR_TYPES)) {
            return self::$ERROR_TYPES[$code]['level'];
        }
        return Error::LEVEL_ERROR;
    }
}
