<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ChartController extends Controller
{
    /**
     * Display the user's list.
     */
    public function index(): View
    {
        return view('custom');
    }

    /**
     * Create the user's  information.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->name."pass"),
    //         'uuid' => Str::uuid(),
    //     ]);
        
    //     return redirect()->route('user.index');
    // }
}
