<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $mainmenu = 'users';
    
    private $submenu  = 'list-users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of table: Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::order('created_at')->get();

        return view('users.list', compact('users'))->with(['mainmenu' => $this->mainmenu, 'submenu' => $this->submenu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = (new Role)->getAsPluckedData('name');

        return view('users.create', compact('roles'))->with(['mainmenu' => $this->mainmenu, 'submenu' => $this->submenu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $user = request()->validate(User::$validationRules);

        request()->merge(array_map("trim", array_map("strip_tags", $user)));

        User::forceCreate($user);
        
        return redirect()->route('users.index')->with('form_success', 'You have successfully created new user entry.');
    }

    /**
     * Get the (INNER) view for changing user's password
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changeUserPassword(User $user)
    {
        return view('users.change-password')->with(['id' => $user->id, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu]);
    }

     /**
     * Post the (INNER) form for changing user's password
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function postChangedUserPassword(User $user)
    {
        $validatedData = request()->validate(User::$passResetRules);

        $user->update($validatedData);
        
        return redirect()->route('users.index')->with('form_success', 'User\'s password has been successfully changed.');
    }
}
