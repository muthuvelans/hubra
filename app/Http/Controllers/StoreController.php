<?php
/**
 * Filename: StoreController.php
 * Description: This controller is used to create,edit,delete and view the stores 
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
namespace App\Http\Controllers;

use App\Repositories\StoreRepository;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
        $this->middleware('auth');

        // Middleware to ensure admin access only for certain methods (optional)
        $this->middleware(function ($request, $next) {
            if (Auth::user()->is_admin) {
                return $next($request);
            }
            return redirect('/home')->with('error', 'Unauthorized access.');
        })->except(['index', 'show']); // Allow all users to access index and show
    }

    public function index()
    {
        $stores = $this->storeRepository->getAllStores();
        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255', // Add more validation rules as needed
        ]);

        $this->storeRepository->createStore($validatedData);
        
        // Redirect to the home page with a success message
        return redirect('/home')->with('success', 'Store created successfully.');
    }

    public function edit($id)
    {
        $store = $this->storeRepository->findStoreById($id);
        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255', // Add more validation rules as needed
        ]);

        $this->storeRepository->updateStore($id, $validatedData);
        
        // Redirect to the home page with a success message
        return redirect('/home')->with('success', 'Store updated successfully.');
    }

    public function destroy($id)
    {
        $this->storeRepository->deleteStore($id);
        
        // Redirect to the home page with a success message
        return redirect('/home')->with('success', 'Store deleted successfully.');
    }

    public function show($id)
    {
        $store = Store::findOrFail($id);
        return view('stores.show', compact('store'));
    }
}
