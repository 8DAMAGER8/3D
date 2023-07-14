<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getById($id): JsonResponse
    {
        return response()->json(User::find($id));
    }

    public function getAll(): JsonResponse
    {
        return response()->json(User::all());
    }

    public function update($id, Request $request): JsonResponse
    {
        try {
            User::where('id', $id)->update(
                [
                    'name' => $request->name,
                    'price' => $request->price
                ]
            );
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 400);
        }

        return response()->json();
    }

    public function create(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|min:8|confirmed'
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::user();


        } catch (Exception $exception) {

            return response()->json($exception->getMessage(), 400);
        }

        return response()->json();
    }

    public function delete($id): JsonResponse
    {
        try {
            User::where('id', $id)->delete();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 400);
        }

        return response()->json();
    }
}
