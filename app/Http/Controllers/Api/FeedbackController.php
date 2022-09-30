<?php

namespace App\Http\Controllers\Api;

use App\Events\FeedbackSent;
use App\Http\Requests\Feedback\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class FeedbackController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * Display a listing of the feedback.
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FeedbackRequest $request)
    {
        $feedback = Feedback::create($request->all());

        event(new FeedbackSent($feedback));

        return response()->json([
            'message' => trans('feedback.messages.sent'),
        ]);
    }
}
