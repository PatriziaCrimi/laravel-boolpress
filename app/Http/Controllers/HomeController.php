<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  /*
  // The instruction "middleware()" is needed to manage all the routes which need an authentication to be navigated --> the user needs to be logged in

  public function __construct()
  {

    // If I add the middleware() function in the file "web.php" I don't need it here.

    $this->middleware('auth');
  }
  */

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }
}
