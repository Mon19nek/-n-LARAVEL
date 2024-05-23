<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Thực hiện logic tìm kiếm ở đây và trả về kết quả tìm kiếm
        return view('pages.search', compact('query'));
    }
}
