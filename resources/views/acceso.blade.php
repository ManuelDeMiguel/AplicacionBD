<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Node;

/**
 * Represents a "<namespace>|<element>" node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class ElementNode extends AbstractNode
{
    private ?string $namespace;
    private ?string $element;

    public function __construct(string $namespace = null, string $element = null)
    {
        $this->namespace = $namespace;
        $this->element = $element;
    }

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function getElement(): ?string
    {
        return $this->elem