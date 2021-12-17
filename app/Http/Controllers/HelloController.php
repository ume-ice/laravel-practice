<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{

    public function index(Request $request, Response $response) {
        $data = [
            ['name' => '山田たろう', 'mail' => 'taro@yamada'],
            ['name' => '田中はなこ', 'mail' => 'tanaka@hanako'],
            ['name' => '鈴木さちこ', 'mail' => 'suzuki@sachico'],
        ];

        return view('hello.index', ['data' => $data]);
    }

    public function post(Request $request) {
        return view('hello.index', ['msg' => $request->msg]);
    }

    // public function other() {
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'Hello/Other') . $style . $body . tag('h1', 'other') . tag('p', 'this is other page') . $end;
    //     return $html;
    // }


    //         $html = <<<EOF
// <html>
// <head>
// <title>Hello/Index</title>
// <style>
// body {font-size:16px;color:#999;}
// h1 {font-size:120px;text-align:right;color:#fafafa;margin:-50px 0px -120px 0px;}
// </style>
// </head>
// <body>
//     <h1>Hello</h1>
//     <h3>Request</h3>
//     <pre>{$request}</pre>
//     <h3>Response</h3>
//     <pre>{$response}</pre>
// </body>
// </html>
// EOF;

//         $response->setContent($html);
//         return $response;

        // global $head, $style, $body, $end;
        // $html = $head . tag('title', 'Hello/Index') . $style . $body . tag('h1', 'index') . tag('p', 'this is index page') . '<a href="/hello/other">go to other page</a>' . $end;
        // return $html;
}

// global $head, $style, $body, $end;
// $head = '<html><head>';
// $style = <<<EOF
// <style>
// body {font-size:16px;color:#999;}
// h1 {font-size:100px;text-align:right;color:#eee;margin:-40px 0px -50px 0px;}
// </style>
// EOF;
// $body = '</head><body>';
// $end = '</body></html>';

// function tag($tag, $txt) {
//     return "<$tag>" . $txt . "</$tag>";
// }