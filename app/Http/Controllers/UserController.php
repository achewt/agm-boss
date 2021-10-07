<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create() {
        $user = new User();
        $roles = Role::all();
        $userRole = array('2');

        return view('admin.user.create', compact('user', 'roles', 'userRole'));
    }

    public function store(Request $request) {
        
        if (isset($request['id']) && $request['id'] != null) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request['id']],
                'role_id' => 'required'
            ]);

            $user = User::find($request['id']);
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();

            DB::table('model_has_roles')->where('model_id', $request['id'])->delete();

            $user->assignRole($request->input('role_id'));
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                // 'role_id' => 'required'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($request->input('role_id'));

            event(new Registered($user));
        }

        return redirect()->route('view-users')->with('message', 'Data has been saved successfully.');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRole = $user->roles->pluck('id','name')->all();

        return view('admin.user.create', compact('user', 'roles', 'userRole'));
    }

    public function destroy($id) {
        $user = User::find($id);

        if ($user) {
            $user->delete($id);
        }

        return redirect()->route('view-users');
    }

    public function viewChangePassword() {
        return view('admin.user.change-password');
    }

    public function changePassword(Request $request) {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'confirmed|required|different:old_password|alpha_dash|min:5|max:13'
        ]);
        
        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            
            return redirect()->route('home')->with('message', 'Data has been saved successfully.');
        } else {
            return back()->withErrors(['Your current password is not correct.']);
        }
    }
}
