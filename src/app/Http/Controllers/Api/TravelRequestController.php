<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TravelRequest;
use App\Http\Requests\TravelRequest as TravelRequestValidation;
use App\Http\Resources\TravelRequestResource;   

class TravelRequestController extends Controller
{
    public function index(Request $request)
{
    $user = auth()->user();

    $travelRequests = TravelRequest::filter($request->all(), $user)
        ->orderByDesc('created_at')
        ->get();

    return TravelRequestResource::collection($travelRequests);
}


    public function store(TravelRequestValidation $request)
    {
        $travelRequest = new TravelRequest();

        $travelRequest->user_id = auth()->user()->id;
        $travelRequest->destination = $request->destination;
        $travelRequest->departure_date = $request->departure_date;
        $travelRequest->return_date = $request->return_date;

        $travelRequest->save();
        return response()->json([
           'status' => true,
           'message' => 'Solicitação de viagem criada com sucesso!'
        ]);

    }

    public function show(string $id)
    {
        $travelRequest = TravelRequest::find($id);
        
        if(!$travelRequest){
            return response()->json([
                'status' => false,
                'message' => 'Solicitação de viagem não encontrada.'
            ], 404);
        }
        return new TravelRequestResource($travelRequest);
    }

    public function update(TravelRequestValidation $request, string $id)
    {
        $travelRequest = TravelRequest::findOrFail($id);
        
        $travelRequest->user_id = $request->user_id;
        $travelRequest->destination = $request->destination;
        $travelRequest->departure_date = $request->departure_date;
        $travelRequest->return_date = $request->return_date;
        $travelRequest->status = $request->status;

        $travelRequest->save();
        return response()->json([
           'status' => true,
           'message' => 'Solicitação de viagem editada com sucesso!'
        ]);
    }

    public function destroy(string $id)
    {
        $travelRequest = TravelRequest::find($id);

        if(!$travelRequest){
            return response()->json([
                'status' => false,
                'message' => 'Solicitação de viagem não encontrada.'
            ], 404);
        }
        $travelRequest->delete();
        return response()->json([
            'status' => true,
            'message' => 'Solicitação de viagem deletada com sucesso.'
        ]);
    }
    public function setStatusTravelRequest(Request $request, string $id)
    {
        $travelRequest = TravelRequest::find($id);

        if(!$travelRequest){
            return response()->json([
                'status' => false,
                'message' => 'Solicitação de viagem não encontrada.'
            ], 404);
        }

        $travelRequest->status = $request->status;
        $travelRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Status da solicitação de viagem atualizado com sucesso.'
        ]);
    }
}
