<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use App\User;
use App\order_log;
use Auth;
use App\Mail\CreateOrder;
use App\Mail\UpdateOrderStatus;
use Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(orders $orders)
    {
         $this->orders            =   $orders;

     }

    public function index()
    {
        $user = Auth::user();
        if($user->hasRole(1)){
            $orders = orders::latest()->get();
        }
        else{
            $current_user_id = Auth::user()->id;
            $orders = orders::where('user_id',$current_user_id)->latest()->get();
        }


        // $orders = orders::all();
        // foreach ($orders as $order)
        // {
        //     $user = User::find($order->user_id);
        //     $order['username'] = $user->name;
        // }

        return view('backend.orders.all',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user_id = Auth::user()->id;
        $log_details = order_log::where('user_id', $current_user_id)->get();
        $log_details = unserialize($log_details[0]->meta_value);
      
        $email_order_details= $log_details;

        $amount=[];

        foreach($log_details as $data){
            $amount[]=$data['price']; 
 
         }
         $total_amount=array_sum($amount);
         $email = $request->email;
        $user_detail=$request->all();

       
        $user_detail=serialize($user_detail);
       

        $log_details=serialize($log_details);

        $order=new orders();
        $order->user_id=$current_user_id;
        $order->user_meta=$user_detail;
        $order->status="pending";
        $order->total_amount=$total_amount;
        $order->order_details=$log_details;
        $order->user_email=$email;
        $order->save();

        Mail::to($email)->send(new CreateOrder($email_order_details));
        order_log::where('user_id', $current_user_id)->delete();

        return redirect()->route('orders.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = orders::where('id',$id)->get();
    
        $order_status = $order[0]['status'];
        $total = $order[0]['total_amount'];
    
        $user_detail = unserialize($order[0]['user_meta']);
        $order = unserialize($order[0]['order_details']);
        $total_blogs = count($order);
        return view('backend.orders.show',['order'=>$order,'user_detail' => $user_detail , 'order_status' => $order_status , 'total' => $total ,'total_blogs' => $total_blogs ]);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $order = orders::where('id',$id)->get();
        $order_full_detail = orders::where('id',$id)->get();

        $order_status = $order[0]['status'];
        $total = $order[0]['total_amount'];

    
        $user_detail = unserialize($order[0]['user_meta']);
        $order = unserialize($order[0]['order_details']);
        $total_blogs = count($order);
        return view('backend.orders.edit',['order_full_detail'=>$order_full_detail,'order'=>$order,'user_detail' => $user_detail , 'order_status' => $order_status , 'total' => $total ,'total_blogs' => $total_blogs ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newstatus=$request->status;
        $order_new_status  =   $this->orders->find($id);
        $order_detail   = unserialize($order_new_status->order_details);
  
        $email = $order_new_status->user_email;
        $order_new_status->status  =   $newstatus;
        if($order_new_status->save()){
            Mail::to($email)->send(new UpdateOrderStatus($order_detail,$order_new_status));
        }
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        $order=orders::where('id',$id)->delete();
        return redirect()->route('orders.index');
        
    }
}
