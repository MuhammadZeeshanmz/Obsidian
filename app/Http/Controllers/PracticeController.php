<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticeRequest;
use App\Http\Resources\PracticeResource;
use App\Models\Practice;
use App\Trait\PracticeTrait as AppPracticeTrait;
use App\Trait\PracticeTrait;
use App\Services\PracticeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    use AppPracticeTrait;
    protected $practiceService;
    public function __construct(PracticeService $practiceService)
    {
        return $this->practiceService = $practiceService;
    }
    public function index()
    {
        $practice = Practice::all();
        return $practice;
    }

    public function store(PracticeRequest $request)
    {
        try {
            $query = $this->practiceService->createPractice($request);
            return $query;
        } catch (\Throwable $th) {
            return $th;
            return $this->error('Failed to store practice', 500);
        }
    }

    public function update(PracticeRequest $request, $id)
    {
        try {
            $query = $this->practiceService->updatePractice($request, $id);
            return $this->success('Practice updated successfully', $query);
        } catch (\Throwable $th) {
            return $this->error('Failed to update practice', 500);
        }
    }

    public function destroy($id)
    {
        $practice = Practice::findOrFail($id);
        $practice->delete();
        return response()->json(null, 204);
    }
    public function recentlyAccessed()
    {
        $practice = $this->practiceService->accessed();
        return $practice;
    }
    public function filter(Request $request)
    {
        $name = $request->name;
        // $npi_code =$request->npi_code;
        $zip = $request->zip;


        $data = Practice::query()

            // ->when($name, fn($q) => $q->where('name', $name))->get();
            // ->when($npi_code, fn($q) => $q->where('npi_code', $npi_code))
            ->when($zip, function ($q, $zip) use($name){
                $q->whereHas('locations', function ($q) use ($zip, $name) {
                    $q->where('zip', $zip,)
                    ->orWhere('name', $name);
                });
            })->get();
        return $data;
    }

    public function show($id)
    {
        try {
            $practice = Practice::with('locations')->findOrFail($id);
            $practice->recently_accessed = now();
            $practice->save();
            return $this->success('Success', new PracticeResource($practice));
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
