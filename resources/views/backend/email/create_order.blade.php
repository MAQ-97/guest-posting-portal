@component('mail::layout')
@slot('header')
    @component('mail::header', ['url' => config('app.url')])

    {{-- <img src="{{url('public/images.jpg')}}" alt="" class="light-logo" style="    width: 100px;
    height: 80px;
    margin: 0 auto;
    margin-bottom: 20px;" /> --}}
    <h2 style="text-align:center;">Guest Posting Portal</h2>
    @endcomponent
@endslot

@slot('subcopy')
    @component('mail::subcopy')

@php $amount=[]; @endphp
    <table>
        <h2 style="text-align:center">Your Order has been Placed Waiting For Admin Approval</h2>
        <tr>
        <th>Blog Title</th>
        <th>Description</th>
        <th>DA</th>
        <th>FB</th>
        <th>Folllowers</th>
        <th>Price</th>
        @foreach($data as $detail)
    <tr>
        <td>{{$detail['title']}}</td>
        <td>{{strip_tags($detail['description'])}}</td>
        <td>{{$detail['da']}}</td>
        <td>{{$detail['fb']}}</td>
        <td>{{$detail['follower']}}</td>
        <td>$ {{$detail['price']}}</td>
       @php  $amount[]=$detail['price']; @endphp
    </tr>
        
       @endforeach
       <tr>
        <td><b>Total Amount : </b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       <td><b> ${{array_sum($amount)}} </b></td>
    </tr>

    </table>

   @endcomponent
@endslot


{{-- Footer --}}

@slot('footer')
    @component('mail::footer')
        <table >
           {{-- <tr class="social-links">
                  <td class="left" style="float:right;margin-left:-10px;"><a href="https://www.facebook.com/PicnicUstad/"><img src="{{Url('storage/social-icon/facebook-circular-logo.png')}}"/></a></td>
                <td><!--<img src="{{Url('storage/social-icon/twitter.png')}}"/>--></td>
               <td><a href="https://www.instagram.com/picnicustad/"><img src="{{Url('storage/social-icon/instagram.png')}}"/></a></td>
            </tr> --}}
            <tr>
                <td colspan="4" style="padding-top: 10px;">
                    &copy; {{ date('Y') }} Guest Posting Portal. All rights reserved.
                </td>
            </tr>
        </table>
 {{-- {{ config('app.name') }} --}}
    @endcomponent
@endslot

@endcomponent

<style>
.social-links {
    text-align: center;
}

.social-links td img{
    width: 30px;
    }
td.panel-content {
padding: 0 !important;

background-color: transparent !important;

}
.header a div{
width:100%;
padding: 15px !important;
color: #3c6daf;
}
.header a{
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
width:100%
}
table.footer ,
td.header {
width: 100% !important;
background: #ffffff;
}
td.header {
padding: 0px !important;
padding-top: 15px !important;

border-bottom: 2px solid #3c6daf;

}

table.footer .content-cell {
    padding: 20px !important;
    background-color: #4f93ef;
    color: #fff;
}
table.footer,
table.content {
    width: 100%;
    max-width: 500px;
}

tr td table.footer {
    max-width: 570px !important;
}



table.footer p,
td.header a {
color: #3c6daf !important;
text-shadow: unset !important;
}
table.subcopy th,
table.subcopy td {
    padding: 5px;
    text-align: left;
}

td.header, td.header a {
    background: #3c8efe;
    padding-top: 20px;
}
td.header{
    padding-top: 0px !Important
}
.content-cell h1 {
    font-size: 13px !Important;
    font-weight: 600 !Important;
    margin-top: 0 !Important;
    text-align: left !Important;
}
.content-cell h2 {
    color: #ffffff !Important;
    background: #FF9800 !Important;
    padding: 8px !Important;
    text-align: center !Important;
}
</style>
