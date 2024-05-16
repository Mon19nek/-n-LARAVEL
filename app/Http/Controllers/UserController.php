<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Lấy danh sách người dùng
        if (Auth::user()->is_admin) {
            // Nếu là admin, lấy tất cả người dùng
            $users = User::all();
        } else {
            // Nếu không phải admin, lấy thông tin của người dùng hiện tại (không bao gồm admin)
            $users = User::where('id', '!=', Auth::id())->get();
        }

        return view('users.index', compact('users'));
    }


    public function destroy(User $user)
    {
        if (Auth::user()->is_admin) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('users.index')->with('error', 'You do not have permission to delete this user.');
        }
    }
}
