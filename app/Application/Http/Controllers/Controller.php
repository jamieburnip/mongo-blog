<?php

namespace Blog\Application\Http\Controllers;

use Chief\CommandBus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 *
 * @package Blog\Application\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var CommandBus
     */
    protected $chief;

    /**
     * Controller constructor.
     *
     * @param CommandBus $chief
     */
    public function __construct(CommandBus $chief)
    {
        $this->chief = $chief;
    }
}
