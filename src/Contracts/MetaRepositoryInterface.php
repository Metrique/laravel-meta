<?php

namespace Metrique\Meta\Contracts;

interface MetaRepositoryInterface
{
    /**
     * Returns the meta tags editor.
     *
     * @return Metrique\MetaTags
     */
    public function tags();

    /**
     * Returns the title editor.
     *
     * @return Metrique\MetaTitle
     */
    public function title();

    /**
     * Returns the slug editor.
     *
     * @return string
     */
    public function slug();

    /**
     * Helper to set the title as the slug.
     */
    public function setTitleAsSlug();
}
