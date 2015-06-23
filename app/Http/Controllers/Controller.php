<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $link_type = 'backend';
    protected $current_theme = 'default';

    public function __construct() {
        list($this->link_type, $this->current_theme) = current_section();
    }
}
