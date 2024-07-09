<?php

namespace Tempest\View\Exceptions;

use Exception;
use ReflectionClass;
use Tempest\View\Components\AnonymousViewComponent;

final class DuplicateViewComponent extends Exception
{
    public function __construct(
        string $name,
        ReflectionClass|AnonymousViewComponent $pending,
        string|AnonymousViewComponent $existing,
    )
    {
        $message = sprintf(
            "Could not register view component `{$name}` from `%s`, because a component with the same name already exists in `%s`",
            $pending instanceof AnonymousViewComponent ? $pending->getPath() : $pending->getName(),
            $existing instanceof AnonymousViewComponent ? $existing->getPath() : $existing,
        );

        parent::__construct($message);
    }
}