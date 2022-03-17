<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public const TERMS = [
        [
            'chapter' => 'Laravelを準備する',
            'items' => [],
        ],
        [
            'chapter' => 'ルーティングとコントローラ',
            'items' => [
                ['name' => 'ルーティング','route' => '',],
                ['name' => 'コントローラの利用','route' => '',],
            ]
        ],
        [
            'chapter' => 'ビューとテンプレート',
            'items' => [
                ['name' => 'PHPテンプレートの利用','route' => '',],
                ['name' => 'Bladeテンプレートを使う','route' => '',],
                ['name' => 'Bladeの構文','route' => '',],
                ['name' => 'レイアウトの作成','route' => '',],
                ['name' => 'サービスとビューコンポーザ','route' => '',],
            ]
        ],
        [
            'chapter' => 'リクエスト・レスポンスを補完する',
            'items' => [],
        ],
        [
            'chapter' => 'データベースの利用',
            'items' => [],
        ],
        [
            'chapter' => 'Eloquent ORM',
            'items' => [],
        ],
        [
            'chapter' => 'その他の機能',
            'items' => [],
        ],
    ];

    public function index2(Request $request, Response $response) {
        return view('home.index', ['terms' => self::TERMS]);
    }
}
