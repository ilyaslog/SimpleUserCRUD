<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{   
    public function index()
    {
        $posts = Post::all(); 
        return view('dashboard', ['posts' => $posts]);
    }
    public function login(Request $request){
        $incomingFields = $request->validate([
            'nameLogin' => ['required'],
            'passwordLogin' => ['required'],
        ]);
    

        if (auth()->attempt(['name' => $incomingFields['nameLogin'], 'password' => $incomingFields['passwordLogin']])) {
            $request->session()->regenerate();
            return redirect('/Dashboard');
        } else {
           
            return redirect('/')->with('error', 'Invalid credentials. Please try again.');
        }
    }
    
    public function logout(){
        auth()->logout();
        return redirect('/');
    } 

    public function register(Request $request) {
    
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
        ]);
    
        try {
           
            $validatedData['password'] = bcrypt($validatedData['password']);
    
           
            $user = User::create($validatedData);
     
            auth()->login($user);
    
            
            session()->flash('success', 'Registration successful!');
    
            
            return redirect('/');
        } catch (\Exception $e) {
           
            return redirect('/register')->with('error', 'Registration failed. Please try again.');
        }
    }
    
    
    
}