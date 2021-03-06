<?php

namespace Metrique\Meta\Contracts;

interface MetaTitleInterface
{
    /**
     * Returns the title as a string
     * @return string
     */
    public function toString();

    /**
     * Returns the title as a slug
     */
    public function toSlug();
    
    /**
     * Sets the title.
     * @param string $title Set the title, use null to leave as default
     * @return $this
     */
    public function set($title);
    
    /**
     * Enables/Disables prefix/suffix/seperator decoration of the title
     * @param  bool $bool
     * @return $this
     */
    public function decorate($bool);

    /**
     * Sets the title prefix
     * @param  string $newPrefix [description]
     * @return $this
     */
    public function prefix($prefix);

    /**
     * Sets the title suffix.
     * @param  string $newSuffix [description]
     * @return $this
     */
    public function suffix($suffix);

    /**
     * Sets the title separator.
     * @param  string $newSeparator [description]
     * @return $this
     */
    public function separator($separator);
}