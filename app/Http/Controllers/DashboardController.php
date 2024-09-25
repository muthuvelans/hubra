<?php
/**
 * Filename: DashboardController.php
 * Description: This file used to redirect the admin and user after login
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\StoreRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $userRepository;
    protected $storeRepository;

    public function __construct(UserRepository $userRepository, StoreRepository $storeRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->storeRepository = $storeRepository;
    }

    //function for user index
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            // Admin sees both users and stores
            $users = $this->userRepository->getAllUsers();
            $stores = $this->storeRepository->getAllStores();
            return view('admin.dashboard', compact('users', 'stores'));
        } else {
            // Non-admin users see only stores
            $stores = $this->storeRepository->getAllStores();
            return view('user.dashboard', compact('stores'));
        }
    }
}
