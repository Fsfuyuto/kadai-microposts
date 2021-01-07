<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoritesController extends Controller
{
    public function store($micropost)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをfavoriteする
        \Auth::user()->favorite($micropost);
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * ユーザをアンフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($micropost)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをunfavoriteする
        \Auth::user()->unfavorite($micropost);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
