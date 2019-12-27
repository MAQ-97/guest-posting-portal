<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $data;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ahsan.amin334@gmail.com')->subject('Your order has been placed')->markdown('backend.email.create_order')->with('data',$this->data);


        // if($this->data2['status']=='pending'){
        //     return $this->from('ahsan.amin334@gmail.com')->subject('Your order has been placed')->markdown('backend.email.create_order')->with('data',$this->data);
        // }else if($this->data2['status']=='confirm'){
        //     return $this->from('ahsan.amin334@gmail.com')->subject('Your order has been confirmed')->markdown('backend.email.create_order')->with('data',$this->data);
        // }else{
        //     return $this->from('ahsan.amin334@gmail.com')->subject('Your order has been completed')->markdown('backend.email.create_order')->with('data',$this->data);
        // }
    }
}
