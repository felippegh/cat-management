<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CatController extends Controller {

    public function index(): AnonymousResourceCollection {
        $cats = Cat::query()->orderBy('name')->get();

        return CatResource::collection($cats);
    }

    public function store(StoreRequest $request): CatResource {
        $cat = Cat::query()
                  ->create($request->validated());

        return new CatResource($cat);
    }

    public function show(Cat $cat): CatResource {
        return new CatResource($cat);
    }

    public function update(StoreRequest $request, Cat $cat): CatResource {
        $cat->update($request->validated());

        return new CatResource($cat);
    }

    public function destroy(Cat $cat): Response {
        try {
            $cat->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response('Something went wrong when trying to delete the cat' . $cat->name);
        }
        return response('Cat deleted successfully');
    }
}
