<?php
/**
 * @author Juriy Panasevich <panasevich@worksolutions.ru>
 */

namespace JuriyPanasevich\BugsBunny\Error;


class Error {

    const LEVEL_INFO = 100;
    const LEVEL_WARNING = 200;
    const LEVEL_ERROR = 300;

    public function __construct($name, $message) {

    }

    public static function getLevels() {
        return [
            self::LEVEL_INFO, self::LEVEL_WARNING, self::LEVEL_ERROR,
        ];
    }

    public function setLevel($level) {
        return $this;
    }

    public function setMeta($metaData) {
        return $this;
    }
}