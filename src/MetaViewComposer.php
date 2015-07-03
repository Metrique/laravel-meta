<?php

namespace Metrique\Meta;

use Illuminate\Contracts\View\View;
use Metrique\Meta\Contracts\MetaRepositoryInterface as MetaRepository;

class MetaViewComposer
{
    /**
     * The meta repository implementation.
     *
     * @var MetaRepository
     */
    protected $meta;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(MetaRepository $meta)
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