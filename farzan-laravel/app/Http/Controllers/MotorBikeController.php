<?php

namespace App\Http\Controllers;

use App\Models\MotorBike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\DB;

class MotorBikeController extends Controller
{
    public function index(Request $request)
    {
        $colors = DB::table('motor_bikes')->select('color')->groupBy('color')->get();

        if ($request->has('sort')) {
            if ($request->input('sort') == "time") {
                $motorbikes = MotorBike::orderBy('created_at')->paginate(5);
            } else {
                $motorbikes = MotorBike::orderBy('price')->paginate(5);
            }
        } elseif ($request->has('color')) {
            $color = $request->input('color');
            $motorbikes = MotorBike::where('color', $color)->paginate(5);
        } else {
            $motorbikes = MotorBike::paginate(5);
        }



        // dd($motorbikes);
        return view('motorbike.index', compact('motorbikes', 'colors'));
    }
    public function create()
    {
        return view('motorbike.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'model' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'image' => [
                'required'
            ],
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $fileName);
        $motorbike = MotorBike::create([
            'model' => $request->model,
            'color' => $request->color,
            'weight' => $request->weight,
            'price' => $request->price,
            'image' => $fileName
        ]);
        return redirect('/motorbikes');
    }
    public function show(MotorBike $motorbike)
    {
        // dd($motorbike);
        return view('motorbike.show', compact('motorbike'));
    }
}
