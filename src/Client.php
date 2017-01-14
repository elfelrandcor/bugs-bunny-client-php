<?php
/**
 * @author Juriy Panasevich <panasevich@worksolutions.ru>
 */

namespace JuriyPanasevich\BugsBunny;


use JuriyPanasevich\BugsBunny\Error\Error;
use JuriyPanasevich\BugsBunny\Error\ErrorTypes;
use JuriyPanasevich\BugsBunny\Notification\DeferredNotification;
use JuriyPanasevich\BugsBunny\Notification\Notification;

class Client {

    protected $config;
    protected $deferredNotification;

    public function __construct($params) {
        $this->config = new Config($params);
        $this->deferredNotification = $this->config->isDeferred() ? new DeferredNotification($this->config) : null;

        register_shutdown_function([$this, 'shutdownHandler']);
    }

    public function handleException($e) {

    }

    public function notifyError($name, $message, $level = null, array $metaData = null) {
        $error = new Error($name, $message);
        $error
            ->setLevel($level)
            ->setMeta($metaData)
        ;
        $this->notify($error);
    }

    public function notify(Error $error) {
        $notification = $this->deferredNotification ?: new Notification($this->config);
        $notification->addError($error);

        !$this->deferredNotification && $notification->send();
    }

    public function shutdownHandler() {
        $lastError = error_get_last();
        if (!is_null($lastError) && ErrorTypes::isFatal($lastError['type'])) {
            $this->notifyError(ErrorTypes::getName($lastError['type']), $lastError['message'], Error::LEVEL_ERROR);
        }
        $this->deferredNotification && $this->deferredNotification->send();
    }
}