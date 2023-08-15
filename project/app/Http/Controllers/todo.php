<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TodoMig;

class todo extends Controller
{
    public function index()
    {
        $todo = DB::table('list')->get();
        return response()->json($todo);
    }
    public function store(Request $request)
    {
        $item = new TodoMig;

        $data = $request->all();

        $item->text = $data["text"];
        $item->save();

        return $data;
    }
    public function update(Request $request) {
        $data = $request->all();

        $item = TodoMig::find($data["id"]);

        $item->done = $data["done"];
        $item->save();

        return response()->json($data);
    }
}
