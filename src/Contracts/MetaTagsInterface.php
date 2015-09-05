<?php

namespace Metrique\Meta\Contracts;

interface MetaTagsInterface
{
    /**
     * Return the tags in an array, in html format.
     * @return array
     */
    public function toArray();
    
    /**
     * Add a new meta tag or set of meta tags.
     *
     * $meta->tags()->add([
     *     ['charset'=>'utf-8'],
     *     ['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1']
     * ]);
     * 
     * @param array $attributes
     * @param boolean $overwriteMatchingKeys
     * @return $this.
     */
    public function add($attributes, $overwrite = true);

    /**
     * Remove a meta tag or set of meta tags by key/value pairs.
     * The value is treated as a wild card when it is set to null.
     *
     * $meta->tags()->remove([
     *     ['charset'=>null],
     *     ['name'=>'viewport', 'content'=>null]
     * ]);
     * 
     * @param  array $matchingKeys
     * @param boolean $removeContents
     * @return $this
     */
    public function remove($attributes, $removeContents = false);

    /**
     * Clears all tags
     * @return $this
     */
    public function clear();

    /**
     * Sets the template to be used to generate the meta tags
     * @param  string $template
     * @return $this
     */
    public function template($template);
}