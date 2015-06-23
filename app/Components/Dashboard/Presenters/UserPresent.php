<?php namespace App\Components\Dashboard\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresent extends Presenter{

    /**
     * Get Fullname Of User
     * @return string
     */
    public function fullname()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    
}
