<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaveUsersRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param SaveUsersRequest $request
     * @return RedirectResponse
     */
    public function store(SaveUsersRequest $request)
    {
        $request->createUser();

        return redirect()
            ->route('users.index')
            ->with('success', 'The user has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveUsersRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(SaveUsersRequest $request, User $user)
    {
        $request->updateUser($user);

        return redirect()
            ->route('users.index')
            ->with('success', 'The user has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('users.index');
    }
}
