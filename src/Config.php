<?php
/**
 * @author Juriy Panasevich <panasevich@worksolutions.ru>
 */

namespace JuriyPanasevich\BugsBunny;


use JuriyPanasevich\BugsBunny\Exception\Exception;

class Config {

    protected $apiKey;
    protected $isDeferred;

    public function __construct($params) {
        foreach ($params as $key => $param) {
            if (!property_exists(self::class, $key)) {
                continue;
            }
            $this->$key = $param;
        }
        if (!$this->apiKey) {
            throw new Exception('Empty API key');
        }
    }

    public function isDeferred() {
        return $this->isDeferred;
    }
}