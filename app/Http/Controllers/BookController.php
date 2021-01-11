<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;

class BookController extends Controller
{
@@ -26,7 +27,6 @@ public function index()
    public function create()
    {
        //

    }

    /**
@@ -38,13 +38,20 @@ public function create()
    public function store(Request $request)
    {
        //
        return Book::create([
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "author" => $request->input('author'),
            "publisher" => $request->input('publisher'),
            "date_of_issue" => $request->input('date_of_issue')
        ]);
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::create([
                "title" => $request->input('title'),
                "description" => $request->input('description'),
                "author" => $request->input('author'),
                "publisher" => $request->input('publisher'),
                "date_of_issue" => $request->input('date_of_issue')
            ]);

            return response(['message' => 'Create Data Success', 'data' => $data], 201);
        } else {
            return response(['message' => 'Not Authenticated', 'data' => null], 401);
        }
    }

    /**
@@ -79,14 +86,20 @@ public function edit($id)
     */
    public function update(Request $request, $id)
    {
        //
        return Book::find($id)->update([
            "title" => $request ->input('title'),
            "description" => $request ->input('description'),
            "author" => $request ->input('author'),
            "publisher" => $request ->input('publisher'),
            "date_of_issue" => $request ->input('date_of_issue')
        ]);
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::find($id)->update([
                "title" => $request->input('title'),
                "description" => $request->input('description'),
                "author" => $request->input('author'),
                "publisher" => $request->input('publisher'),
                "date_of_issue" => $request->input('date_of_issue')
            ]);
            return response(['message' => 'Update Data Success', 'data' => $data], 201);

        } else {
            return response(['message' => 'Not Authenticated', 'data' => null], 401);
        }
    }

    /**
@@ -97,7 +110,14 @@ public function update(Request $request, $id)
     */
    public function destroy($id)
    {
        //
        return Book::destroy($id);
        $isLoggedIn = auth()->user();
        if ($isLoggedIn) {
            $data = Book::destroy($id);
            return response(['message' => 'Delete Data Success', 'data' => $data], 201);

        } else {
            return response(['message' => 'Not Authenticated', 'data' => null], 401);
        }

    }
}
} 