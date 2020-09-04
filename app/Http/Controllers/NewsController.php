<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function show()
    {
        $news = News::all();
        return response()->json(
            [
                'status' => 'success',
                'news' => $news->toArray()
            ], 200);
    }
    public function item($id)
    {
        $news = News::find($id);
        return response()->json(
            [
                'status' => 'success',
                'news' => $news
            ], 200);
    }
    public function create(Request $request)
    {
        if (Auth::user()->role != 2)
        {
            return response()->json([
                  'status' => 'error',
                  'errors' => "Forbidden"
                ], 403);
        }

        $v = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description'  => 'required',
            'photoLink'  => 'required',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $news = new News;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->photo = $request->photoLink;
        $news->save();
        return response()->json(['status' => 'success'], 200);
    }
    public function delete($id)
    {
        if (Auth::user()->role != 2)
        {
            return response()->json([
                  'status' => 'error',
                  'errors' => "Forbidden"
                ], 403);
        }

        if (News::where('id',$id)->delete()) return response()->json(['status' => 'success'], 200);
        else return response()->json(['status' => 'error'], 500);
    }
}
