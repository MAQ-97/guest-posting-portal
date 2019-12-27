<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateOrderStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data1,$data2)
    {
        $this->data1=$data1;
        $this->data2=$data2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
           if($this->data2['status']=='pending'){
            return $this->from('ahsan.amin334@gmail.com')->subject('Your order has been placed')->markdown('backend.email.update_order')->with(['data1'=>$this->data1,'data2'=>$this->data2]);
        }else if($this->data2['status']=='confirm'){
            return $this->from('ahsan.amin334@gmail.com')->subject('Your order has been confirmed')->markdown('backend.email.update_order')->with(['data1'=>$this->data1,'data2'=>$this->data2]);
        }else{
            return $this->from('ahsan.amin334@gmail.com')->subject('Your order has been completed')->markdown('backend.email.update_order')->with(['data1'=>$this->data1,'data2'=>$this->data2]);
        }
    }
}
