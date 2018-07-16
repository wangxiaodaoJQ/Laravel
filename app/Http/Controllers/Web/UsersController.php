<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\UserFormRequest;

class UsersController extends Controller
{
    /**
     * 用户详情页。
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, User $user)
    {
        return view('web.users.show', compact('user'));
    }

    /**
     * 用户编辑页。
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Request $request, User $user)
    {
        // $this->authorize('update', $user);
        return view('web.users.edit', compact('user'));
    }
    /**
     * 用户更新操作。
     *
     * @param \App\Http\Requests\Web\UserFormRequest $request
     * @param \App\Models\User                       $user
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        UserFormRequest $request,
        User $user
    ) {
        $data = $request->all();
        if ($request->avatar) {
            // TODO: 后期补充。
        }
        $user->update($data);
        return redirect()
            ->route('users.show', $user->id)
            ->with('success', '个人资料更新成功！');
    }
}