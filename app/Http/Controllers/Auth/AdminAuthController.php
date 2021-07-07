<?
namespace App\Http\Controllers\Auth\AdminAuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller{

    public function index()
    {
        return 1;
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->get('remember');
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'active_status' => 1])) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->route('admin.login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
