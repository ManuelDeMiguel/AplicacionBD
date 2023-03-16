<?php

namespace Webmozart\Assert;

use ArrayAccess;
use Closure;
use Countable;
use Throwable;

/**
 * This trait provides nurllOr*, all* and allNullOr* variants of assertion base methods.
 * Do not use this trait directly: it will change, and is not designed for reuse.
 */
trait Mixin
{
    /**
     * @psalm-pure
     * @psalm-assert string|null $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrString($value, $message = '')
    {
        null === $value || static::string($value, $message);
    }

    /**
     * @psalm-pure
     * @psalm-assert iterable<string> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allString($value, $message = '')
    {
        static::isIterable($value);

        foreach ($value as $entry) {
            static::string($entry, $message);
        }
    }

    /**
     * @psalm-pure
     * @psalm-assert iterable<string|null> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function allNullOrString($value, $message = '')
    {
        static::isIterable($value);

        foreach ($value as $entry) {
            null === $entry || static::string($entry, $message);
        }
    }

    /**
     * @psalm-pure
     * @psalm-assert non-empty-string|null $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public static function nullOrStringNotEmpty($value, $message = '')
    {
        null === $value || static::stringNotEmpty($value, $message);
    }

    /**
     * @psalm-pure
     * @psalm-assert iterable<non-empty-string> $value
     *
     * @param mixed  $value
     * @param string $message
     *
     * @throws InvalidArgumentExc