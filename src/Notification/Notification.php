<?php
/**
 * @author Juriy Panasevich <panasevich@worksolutions.ru>
 */

namespace JuriyPanasevich\BugsBunny\Notification;


use JuriyPanasevich\BugsBunny\Config;
use JuriyPanasevich\BugsBunny\Error\Error;

class Notification {

    protected $config;
    protected $errors = [];

    public function __construct(Config $config) {
        $this->config = $config;
    }

    public function addError(Error $error) {
        $this->errors[] = $error;
        return $this;
    }

    public function send() {
        $this->errors = [];
    }
}