Webmozart Assert
================

[![Latest Stable Version](https://poser.pugx.org/webmozart/assert/v/stable.svg)](https://packagist.org/packages/webmozart/assert)
[![Total Downloads](https://poser.pugx.org/webmozart/assert/downloads.svg)](https://packagist.org/packages/webmozart/assert)

This library contains efficient assertions to test the input and output of
your methods. With these assertions, you can greatly reduce the amount of coding
needed to write a safe implementation.

All assertions in the [`Assert`] class throw an `Webmozart\Assert\InvalidArgumentException` if
they fail.

FAQ
---

**What's the difference to [beberlei/assert]?**

This library is heavily inspired by Benjamin Eberlei's wonderful [assert package],
but fixes a usability issue with error messages that can't be fixed there without
breaking backwards compatibility.

This package features usable error messages by default. However, you can also
easily write custom error messages:

```
Assert::string($path, 'The path is expected to be a string. Got: %s');
```

In [beberlei/assert], the ordering of the `%s` placeholders is different for
every assertion. This package, on the contrary, provides consistent placeholder
ordering for all assertions:

* `%s`: The tested value as string, e.g. `"/foo/bar"`.
* `%2$s`, `%3$s`, ...: Additional assertion-specific values, e.g. the
  minimum/maximum length, allowed values, etc.

Check the source code of the assertions to find out details about the additional
available placeholders.

Installation
------------

Use [Composer] to install the package:

```bash
composer require webmozart/assert
```

Example
-------

```php
use Webmozart\Assert\Assert;

class Employee
{
    public function __construct($id)
    {
        Assert::integer($id, 'The employee ID must be an integer. Got: %s');
        Assert::greaterThan($id, 0, 'The employee ID must be a positive integer. Got: %s');
    }
}
```

If you create an employee with an invalid ID, an exception is thrown:

```php
new Employee('foobar');
// => Webmozart\Assert\InvalidArgumentException:
//    The employee ID must be an integer. Got: string

new Employee(-10);
// => Webmozart\Assert\InvalidArgumentException:
//    The employee ID must be a positive integer. Got: -10
```

Assertions
----------

The [`Assert`] class provides the following assertions:

### Type Assertions

Method                                                   | Description
-------------------------------------------------------- | --------------------------------------------------
`string($value, $message = '')`                          | Check that a value is a string
`stringNotEmpty($value, $message = '')`                  | Check that a value is a non-empty string
`integer($value, $message = '')`                         | Check that a value is an integer
`integerish($value, $message = '')`                      | Check that a value casts to an integer
`positiveInteger($value, $message = '')`                 | Check that a value is a positive (non-zero) integer
`float($value, $message = '')`                           | Check that a value is a float
`numeric($value, $message = '')`                         | Check that a value is numeric
`natural($value, $message= ''')`                         | Check that a value is a non-negative integer
`boolean($value, $message = '')`                         | Check that a value is a boolean
`scalar($value, $message = '')`                          | Check that a value is a scalar
`object($value, $message = '')`                          | Check that a value is an object
`resource($value, $type = null, $message = '')`          | Check that a value is a resource
`isCallable($value, $message = '')`                      | Check that a value is a callable
`isArray($value, $message = '')`                         | Check that a value is an array
`isTraversable($value, $message = '')`  (deprecated)     | Check that a value is an array or a `\Traversable`
`isIterable($value, $message = '')`                      | Check that a value is an array or a `\Traversable`
`isCountable($value, $message = '')`                     | Check that a value is an array or a `\Countable`
`isInstanceOf($value, $class, $message = '')`            | Check that a value is an `instanceof` a class
`isInstanceOfAny($value, array $classes, $message = '')` | Check that a value is an `instanceof` at least one class on the array of classes
`notInstanceOf($value, $class, $message = '')`           | Check that a value is not an `instanceof` a class
`isAOf($value, $class, $message = '')`                   | Check that a value is of the class or has one of its parents
`isAnyOf($value, array $classes, $message = '')`         | Check that a value is of at least one of the classes or has one of its parents
`isNotA($value, $class, $message = '')`                  | Check that a value is not of the class or has not one of its parents
`isArrayAccessible($value, $message = '')`               | Check that a value can be accessed as an array
`uniqueValues($values, $message = '')`                   | Check that the given array contains unique values

### Comparison Assertions

Method                                          | Description
----------------------------------------------- | -