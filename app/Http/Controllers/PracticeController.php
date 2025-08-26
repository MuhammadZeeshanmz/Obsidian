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
            $data = $this->practiceService->createPractice($request);
            return $this->success('Practice created successfully', $data);
        } catch (\Throwable $th) {
            return $this->error('Failed to store practice', 500);
        }
    }

    public function update(PracticeRequest $request, $id)
    {
        try {
            $data = $this->practiceService->updatePractice($request, $id);
            return $this->success('Practice updated successfully', $data);
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

    public function show($id)
    {
        try {
            $practice = Practice::findOrFail($id);
            $practice->recently_accessed = now();
            $practice->save();
            return $this->success('Success', new PracticeResource($practice));
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
