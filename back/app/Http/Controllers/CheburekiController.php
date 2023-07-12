<?php

namespace App\Http\Controllers;

use App\Models\Chebureki;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CheburekiController extends Controller
{
    public function getById($id): JsonResponse
    {
        return response()->json(Chebureki::find($id));
    }

    public function getAll(): JsonResponse
    {
        return response()->json(Chebureki::all());
    }

    public function update($id, Request $request): JsonResponse
    {
        try {
            Chebureki::where('id', $id)->update(
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
            Chebureki::create([
                'name' => $request->name,
                'price' => $request->price
            ]);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 400);
        }

        return response()->json();
    }

    public function delete($id): JsonResponse
    {
        try {
            Chebureki::where('id', $id)->delete();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 400);
        }

        return response()->json();
    }
}
