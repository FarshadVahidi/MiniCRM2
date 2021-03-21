<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::paginate(10);
        //I AM NOT SHOW IN THIS CASE ADMINISTRATOR CAN SEE AND MODIFY SUPER ADMINISTRATOR PROFILE MAYBE BE BETTER TO ELEMENT SUPER ADMIN FROM LIST
        //$USER = USER::WHERE('ROLE_NAME', '<>', 'Superadministrator')->paginate(10);
        return View::make('Admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return View::make('Admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
//        if(auth()->user()->id != $id)
//            abort(403);
//        $user = User::findOrFail($id);
        return View::make('Admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function update(Request $request, User $user)
    {
        $user->update($this->validateRequest());
        $this->storeImage($user);

        Session::flash('message', 'Your Data Successfully Updated');
        return View::make('Admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateRequest()
    {
        return tap(request()->validate([
            'name'      =>  'required|string|min:3|max:255',
            'lastName'  =>  'required|string|min:3|max:255',
            'email'     =>  'required|email',
            'phone'     =>  'required|string'
        ]), function(){
            if(request()->hasFile('photo'))
            {
                request()->validate([
                    'photo' => 'file|image|max:5000'
                ]);
            }
        });
    }

    //I CAN NOT UNDERSTAND THIS SHOULD WORK PROPERLY BUT IN DATABASE ADD PREFIX UPLOADS/... TO MY IMGE NAME AND IN SHOW.BLADE I CAN NOT SEE IT
    private function storeImage($user)
    {
        if(request()->hasFile('photo'))
        {
            $user->update([
                'photo' => request()->photo->store('uploads', 'public'),
            ]);
        }
    }
}
