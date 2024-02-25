<?php

namespace App\Repositories;

use App\Models\User;

class CategoryRepository
{

    /**
     * Get all of the categories for a given user 
     *
     * @param User $user
     * @return Collection
     */

     public function forUser(User $user)
     {    
        return $user->categories()
            ->orderBy('created_at', 'asc')
            ->get();
     }
}