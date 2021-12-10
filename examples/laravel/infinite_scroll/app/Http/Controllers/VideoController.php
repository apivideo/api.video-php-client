<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\InfiniteScroll;

class VideoController extends Controller
{
    public function InfiniteScroll(Request $request)
    {
        $posts = InfiniteScroll::paginate(5);
        if($request->ajax()){
            $view = view('data',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('holidayView', compact('posts'));
    }
}
