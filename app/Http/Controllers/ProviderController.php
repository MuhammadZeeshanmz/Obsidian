<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use App\ProviderTrait;
use App\Services\ProviderService;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    use ProviderTrait;

    protected $providerService;

    public function __construct(ProviderService $providerService)
    {
        return $this->providerService = $providerService;
    }
    public function index() {}

    public function store(Request $request)
    {
        try {
            return $query = $this->providerService->createProvider($request);
            return $query;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $query = $this->providerService->updateProvider($request, $id);
            return $query;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function destroy($id)
    {
        try {
            $provider = Provider::findOrFail($id);
            $provider->delete();
            return response()->json(null, 204);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


    public function recentlyAccssed()
    {
        $data = $this->providerService->accessd();
        return $data;
    }



    public function show($id)
    {
        $provider = Provider::with(['billing.practice', 'note'])->findOrFail($id);
        $provider->recently_accessed = now();
        $provider->save();
        return $provider;
    }
}
