<?php

namespace App\Providers;

use App\Models\Food;
use Illuminate\Support\ServiceProvider;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Food::created(function (Food $food) {

            $token =    env('TELEGRAM_TOKEN', null);
            $id_chat =  env('TELEGRAM_ID_CHAT', null);
            $mess = "ID:". $food->id ." name:" . $food->name . " save in DB";

//            https://api.telegram.org/bot1002967319:AAHwv9_bnEblRPUlHeaBXOjeCOwO7o72oY8/sendMessage?chat_id=313308702&text=PING


            file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$id_chat."&text=".urlencode($mess));
        });
    }
}
