<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\User;

class ShowuController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.user.show', compact('user'));

    }
}
