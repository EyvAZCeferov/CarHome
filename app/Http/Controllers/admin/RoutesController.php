<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index(Request $request)
    {
        try {
            $page = $request->input("page") ?? 'welcome';
            $pagename = '';
            $title = '';
            $routename = '';
            $data = null;
            switch ($page) {
                case 'welcome':
                    $pagename = 'welcome';

                    $data = null;
                    break;
                case 'settings':
                    $pagename = 'settings';
                    $title = 'Parametrlər';
                    $routename = 'settings';
                    $data = settings();
                    break;
            }
            return view("admin." . $pagename, compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
