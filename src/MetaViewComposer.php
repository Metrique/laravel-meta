<?php

namespace Metrique\Meta;

use Illuminate\Contracts\View\View;
use Metrique\Meta\Contracts\MetaRepositoryInterface as Repository;

class MetaViewComposer
{
    /**
     * The meta repository implementation.
     *
     * @var Repository
     */
    protected $meta;

    /**
     * Create a new profile composer.
     *
     * @param  Repository  $meta
     * @return void
     */
    public function __construct(Repository $meta)
    {
        // Dependencies automatically resolved by service container...
        $this->meta = $meta;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('meta', $this->meta);
    }
}