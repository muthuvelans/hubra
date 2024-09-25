<?php
/**
 * Filename: UserController.php
 * Description: This controller is used to create,edit,delete and view the user details
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationDetails;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth');

        // Middleware to check if the user is admin
        $this->middleware(function ($request, $next) {
            if (Auth::user()->is_admin) {
                return $next($request);
            }
            return redirect('/home')->with('error', 'Unauthorized access.');
        })->except('show'); // Regular users can access the show method
    }

    // Admin can view users list
    public function index()
    {
        $users = $this->userRepository->getAllUsers();
        return view('users.index', compact('users'));
    }

    // Show user creation form for admin only
    public function create()
    {
        return view('users.create');
    }

    // Store new user and send registration details via email
    public function store(Request $request)
    {
        if (auth()->user()->is_admin) {
            // Validation
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
    
            // Generate a random password
            $password = Str::random(8);
    
            // Create the user
            $user = $this->userRepository->createUser(array_merge($validatedData, [
                'password' => bcrypt($password),
            ]));
    
            // Send registration details email
            Mail::to($user->email)->send(new RegistrationDetails($user, $password));
    
            // Redirect to the home page with a success message
            return redirect('/home')->with('success', 'User created and registration details sent via email.');
        }
    
        return redirect('/home')->with('error', 'Unauthorized access');
    }
    
    // Show user edit form (admin only)
    public function edit($id)
    {
        $user = $this->userRepository->findUserById($id);
        return view('users.edit', compact('user')); // Redirecting to the edit view
    }

    // Update user details (admin only)
    public function update(Request $request, $id)
    {
        $this->userRepository->updateUser($id, $request->all());
        return redirect('/home')->with('success', 'User updated successfully.');
    }

    // Delete user (admin only)
    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);
        return redirect('/home')->with('success', 'User deleted successfully.');
    }

    // Show user details for viewing only (all users can access this)
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Admin can view any user's details, regular users can only view their own
        if (auth()->user()->is_admin || auth()->user()->id == $user->id) {
            return view('users.show', compact('user'));
        }

        return redirect('/home')->with('error', 'Unauthorized access');
    }
}
