<?php

declare(strict_types=1);

use Html\AppWebPage;

// Decode error level
function decodeError(int $code): string
{
    return match ($code) {
        E_PARSE => 'E_PARSE',
        E_ERROR => 'E_ERROR',
        E_CORE_ERROR => 'E_CORE_ERROR',
        E_COMPILE_ERROR => 'E_COMPILE_ERROR',
        E_USER_ERROR => 'E_USER_ERROR',
        E_WARNING => 'E_WARNING',
        E_USER_WARNING => 'E_USER_WARNING',
        E_COMPILE_WARNING => 'E_COMPILE_WARNING',
        E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR',
        E_NOTICE => 'E_NOTICE',
        E_USER_NOTICE => 'E_USER_NOTICE',
        E_STRICT => 'E_STRICT',
        E_DEPRECATED => 'E_DEPRECATED',
        E_USER_DEPRECATED => 'E_USER_DEPRECATED',
        default => 'Unknown error',
    };
}

function setErrorHandler(AppWebPage $webPage): void
{
    // Set error handler for all kind of errors
    set_error_handler(function (int $errorCode, string $errorString, string $errorFile, int $errorLine) use ($webPage) {
        $error = decodeError($errorCode);
        $webPage->appendContent(<<<HTML
            <h2 class="error">Problème rencontré</h2>
            <p class="error"><code>$error</code> : $errorString in <code>$errorFile:$errorLine</code>
            HTML
        );
    }, E_ALL | E_WARNING | E_NOTICE | E_STRICT);
}
