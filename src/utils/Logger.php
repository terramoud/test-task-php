<?php

namespace User\TestTaskPhp\utils;

use User\TestTaskPhp\Paths;


/**
 * Class Logger
 *
 * This class provides logging functionality for the application.
 */
class Logger
{
    private string $className;

    /**
     * Logger constructor.
     *
     * @param string $className The name of the class or component using the logger.
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * Log a message.
     *
     * @param mixed $message The message to be logged.
     * @param int $level The log level (default is 3).
     */
    public function log(string $message, int $level = 3): void
    {
        $formattedMessage = $this->formatLogMessage($message);
        error_log($formattedMessage, $level, Paths::LOG_FILE);
    }

    /**
     * Format a log message with a timestamp and class name.
     *
     * @param mixed $message The message to be formatted.
     *
     * @return string The formatted log message.
     */
    protected function formatLogMessage(string $message): string
    {
        return date('Y-m-d H:i:s') . ' [' . $this->className . ']: ' . $message . PHP_EOL;
    }
}
