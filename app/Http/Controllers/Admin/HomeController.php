<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index()
  {
    return view('admin.home');
  }

  public function profile() {
    return view('admin.profile');
  }

  public function generateToken() {
    // Generating a random string
    $api_token = Str::random(80);
    // Associating the API token to the user
    $user = Auth::user();
    $user->api_token = $api_token;
    // Saving the API token just generated
    $user->save();
    // Updating the page
    return redirect()->route('admin.profile');
  }
}
