<?php

namespace Metrique\Meta;

use Metrique\Meta\Contracts\MetaTitleInterface;
use Illuminate\Contracts\Config\Repository as Config;
use Stringy\Stringy;

class MetaTitle implements MetaTitleInterface
{
    /**
     * Array to hold character limits.
     *
     * @var array
     */
    public $character_limit = [
        'enabled' => true,
        'length' => 155,
        'suffix' => '...',
    ];

    /**
     * Title tag data populated with defaults.
     *
     * @var array
     */
    public $title = [
        'decorate' => true,
        'default' => '',
        'prefix' => '',
        'suffix' => '',
        'separator' => '',
        'value' => '',
        'slug' => '',
    ];

    public function __construct(Config $config)
    {
        // Populate the defaults
        $this->character_limit = array_merge(
            $this->character_limit,
            $config->get('meta.character_limit')
        );

        $this->title = array_merge(
            $this->title,
            $config->get('meta.title')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        if (empty($this->title['value'])) {
            $this->title['value'] = $this->title['default'];
        }

        if ($this->character_limit['enabled']) {
            $this->title['value'] = Stringy::create($this->title['value'])->safeTruncate(
                $this->character_limit['length'],
                $this->character_limit['suffix']
            );
        }

        $title = (string) $this->title['value'];

        // Prefix
        $prefix = $this->title['prefix'];

        if (!empty($title) && !empty($this->title['prefix'])) {
            $prefix = $this->title['prefix'].$this->title['separator'];
        }

        // Suffix
        $suffix = $this->title['suffix'];

        if (!empty($title) && !empty($this->title['suffix'])) {
            $suffix = $this->title['separator'].$this->title['suffix'];
        }

        if ($this->title['decorate']) {
            return $prefix.$title.$suffix;
        }

        return $title;
    }

    public function toSlug()
    {
        $slug = Stringy::create($this->title['value'])->slugify();

        if (empty((string) $slug)) {
            return;
        }

        return $slug;
    }

    /**
     * {@inheritdoc}
     */
    public function set($title)
    {
        // Title
        if (is_string($title)) {
            $this->title['value'] = $title;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function decorate($bool)
    {
        $this->title['decorate'] = $bool;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function prefix($prefix)
    {
        if (is_string($prefix)) {
            $this->title['prefix'] = $prefix;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function suffix($suffix)
    {
        if (is_string($suffix)) {
            $this->title['suffix'] = $suffix;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function separator($separator)
    {
        if (is_string($separator)) {
            $this->title['separator'] = $separator;
        }

        return $this;
    }
}
