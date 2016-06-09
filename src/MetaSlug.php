<?php

namespace Metrique\Meta;

use Metrique\Meta\Contracts\MetaSlugInterface;
use Illuminate\Contracts\Config\Repository as Config;
use Stringy\Stringy;

class MetaSlug implements MetaSlugInterface
{
    /**
     * The slug.
     *
     * @var array
     */
    public $slug;

    public function __construct(Config $config)
    {
        // Populate the defaults
        $this->set($config->get('meta.slug.name'));
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        if (empty((string) $this->slug)) {
            return;
        }

        return $this->slug;
    }

    /**
     * {@inheritdoc}
     */
    public function set($slug)
    {
        // Title
        if (is_string($slug)) {
            $this->slug = Stringy::create($slug)->slugify();
        }

        return $this;
    }
}
