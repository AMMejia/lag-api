<?php

namespace App\Http\Controllers\Payments;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function updateImages(Request $request){
        $user = auth()->guard('api')->user();
        $image = new Image();
        $image->image = \Storage::url(\Storage::disk('public')->putFile('uploads/images', $request->file('image')));
        $image->user()->associate($user);
        $image->save();

        return response()->json([
            'message' => 'Imagen subida con exito',
            'status' => 'success'
        ], 200);
    }

    public function updateCash(User $user, Request $request){
        $sum =  $request->cash + $user->cash;
        $user->update(['cash' => $sum]);
        if($sum >= $user->due){
            $user->update(['payment'=> true]);
        }
        $user->save();

        return response()->json([
            'message' => 'Actualizado con exito',
            'status' => 'success'
        ], 200);
    }

    public function checkImages(User $user){

        return response()->json([
            'images' => $user->images,
            'status' => 'success'
        ], 200);
    }
}
