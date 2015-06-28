<?php namespace App\Components\Dashboard\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresent extends Presenter{

    /**
     * Get Fullname Of User
     * @return string
     */
    public function fullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getRoles()
    {
        $roles = [];
        foreach( $this->roles as $role) {
            $roles[] = $role->display_name;
        }
        return $roles;
    }
}
