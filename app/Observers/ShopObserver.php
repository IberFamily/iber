<?php

namespace App\Observers;

use App\Models\Shop;
use Illuminate\Support\Facades\Mail;

class ShopObserver
{
    /**
     * Handle the Shop "created" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function created(Shop $shop)
    {

    }

    /**
     * Handle the Shop "updated" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function updated(Shop $shop)
    {
        if($shop->getOriginal('is_active') == false && $shop->is_active == true )
        {
            $mailBody = "You have been Activated!";
            $mMail = $shop->owner();
            $to_name = "user";
            $to_email = $mMail;;
            $data = array('name'=>"user", "body" => $mailBody);

            Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                        ->subject('You have been activated, please go to your weblink and check qut you account');
                $message->from('FROM_EMAIL_ADDRESS','Artisans Web');
            });
        }else{
            DD("Erorcina brate");
        }
    }

    /**
     * Handle the Shop "deleted" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function deleted(Shop $shop)
    {
        //
    }

    /**
     * Handle the Shop "restored" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function restored(Shop $shop)
    {
        //
    }

    /**
     * Handle the Shop "force deleted" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function forceDeleted(Shop $shop)
    {
        //
    }
}
