<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateusController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        dd(12);
        $data = $request->validated();
        dd($data);
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }
}
