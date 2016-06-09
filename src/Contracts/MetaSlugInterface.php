<?php

namespace Metrique\Meta\Contracts;

interface MetaSlugInterface
{
    /**
     * Returns the title as a string.
     *
     * @return string
     */
    public function toString();

    /**
     * Sets the title.
     *
     * @param string $title Set the title, use null to leave as default
     *
     * @return $this
     */
    public function set($title);
}
