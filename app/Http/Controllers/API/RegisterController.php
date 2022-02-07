<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends BaseController
{
    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'       => ['required', 'string'],
            'email'      => ['required', 'email'],
            'password'   => ['required', 'string'],
            'c_password' => ['required', 'same:password'],
            'role'       => [Rule::in(['admin', 'employee', 'manager'])]
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user                  = User::create($validated);
        $success               = [
            'token' => $user->createToken('EmployeeReview')->plainTextToken,
            'email' => $user->email,
            'role'  => $user->role
        ];

        return $this->sendResponse($success, 'Registration Successful');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'      => ['required', 'email'],
            'password'   => ['required', 'string'],
        ]);

        if (Auth::attempt($validated)) {
            $user = Auth::user();
            $success               = [
                'token' => $user->createToken('EmployeeReview')->plainTextToken,
                'email' => $user->email,
                'role'  => $user->role
            ];

            return $this->sendResponse($success, 'Registration Successful');
        } else {
            return $this->sendError('Unauthorized. ', ['error' => 'Unauthorized']);
        }
    }
}
