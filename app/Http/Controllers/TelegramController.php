<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function get()
    {
        // Telegram::setWebhook([
        //     'url' => ''
        // ]);

        $get = Telegram::getUpdates(); // هاي تجيب كل رسائل الي راح توصل بل قناة
        dd($get);
    }
    public function index()
    {
        $response = Telegram::getMe();
        $username = $response->getUsername(); // retern username of bot
        return view('telegeram', compact('username'));
    }
    public function store(Request $request)
    {

        Telegram::sendMessage([
            'chat_id' => '-1001389464444',
            'parse_mode' => 'HTML',
            'text' => $request->text,
            'disable_notification' => false,
        ]);

        // Telegram::forwardMessage([
        //     'chat_id' => '-1001389464444',
        //     'from_chat_id' => '-1001300452042',
        //     'message_id' => 1
        // ]);
        return redirect()->back();
    }
}