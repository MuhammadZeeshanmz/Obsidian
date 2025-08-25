<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticeRequest;
use App\Models\Practice;
use App\Services\PracticeService;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    protected $practiceService;
    public function __construct(PracticeService $practiceService)
    {
        return $this->practiceService = $practiceService;
    }
    public function index() {}

    public function store(PracticeRequest $request)
    {
       $data = $this->practiceService->createPractice($request);
       return $data;
    }
}
