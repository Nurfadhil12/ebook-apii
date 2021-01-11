<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Author;
use Validator;
use App\User;

class AuthorController extends Controller
{
@@ -21,6 +24,7 @@ public function index()
        }else{
            return response(['message' => 'No data to be displayed', 'data' => null], 404);
        }

    }

    /**
@@ -30,6 +34,7 @@ public function index()
     */
    public function create()
    {

        //
    }

@@ -41,14 +46,16 @@ public function create()
     */
    public function store(Request $request)
    {
        return Author::create([
        // id, name, date_of_birth, place_of_birth, gender, email, hp , create_at, update_at.
        $data = Author::create([
            "name" => $request->input('name'),
            "date_of_birth" => $request->input('date_of_birth'),
            "place_of_birth" => $request->input('place_of_birth'),
            "gender" => $request->input('gender'),
            "email" => $request->input('email'),
            "hp" => $request->input('hp')
            "hp" => $request->input('hp'),
        ]);

        return response(['message' => 'Create data success', 'data' => $data], 201);
    }

@@ -60,12 +67,14 @@ public function store(Request $request)
     */
    public function show($id)
    {
        //$author = Author::find($id);
        //
        $author = Author::find($id);
        if ($author) {
            return response(['message' => 'Show data success', 'data' => $author], 200);
        }else{
            return response(['message' => 'data not found', 'data' => null], 404);
        }

    }

    /**
@@ -88,6 +97,7 @@ public function edit($id)
     */
    public function update(Request $request, $id)
    {
        //
        $author = Author::find($id);
        if ($author) {
            $data = $author->update([
@@ -112,6 +122,7 @@ public function update(Request $request, $id)
     */
    public function destroy($id)
    {
        //
        $author = Author::find($id);
        if ($author) {
            $data = Author::destroy($id);
@@ -120,5 +131,4 @@ public function destroy($id)
            return response(['message' => 'no data to delete', 'data' => null], 404);
        }
    }

}
}