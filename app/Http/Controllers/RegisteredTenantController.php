<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterTenantRequest;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;

class RegisteredTenantController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(RegisterTenantRequest $request)
    {
        // $2y$10$MhjZb9eUzTOc9aNafsmLrus0EaoVdTe.HItNCHqUq/RPXpkdIWz.y
        // $request->merge(['password' => Hash::make($request->password), 'password_confirmation' => Hash::make($request->password_confirmation)]);
        // $validation = $request->validated();
        // if(isset($validation['password'])) {
        //     $validation['password'] = Hash::make($validation['password']);
        // }

        $tenent = Tenant::create($request->validated());
        $tenent->createDomain(['domain'=>$request->domain]);
    }
}
