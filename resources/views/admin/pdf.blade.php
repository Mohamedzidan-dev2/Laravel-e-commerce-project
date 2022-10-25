<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />

    <style>
        img{
            width: 140px;
            height: 112px;
            border-radius: 15%;
        }
    </style>
</head>
<body>
    <h1 style="color: red ;text-align:center" >Order Details</h1>
    <ul>
        <li>User Name            :<h3> {{$data->name}}</h3>       </li>
        <li>User Email           : <h3>{{$data->email}}</h3>      </li>
        <li>User Phone           :<h3>{{$data->phone}}</h3>       </li>
        <li>User Address         :<h3> {{$data->address}}</h3>    </li>
        <li>Product Title   : <h3>{{$data->product_title}}</h3>   </li>
        <li>Product Quntity     : <h3>{{$data->quntity}}</h3>     </li>
        <li>ProductPrice           : <h3>{{$data->price}}</h3>    </li>
        <li>Payment Status :<h3> {{$data->payment_status}}</h3>   </li>
        <li>Delivery Status : <h3>{{$data->delivery_status}}</h3> </li>
        <li>Date            : <h3>{{$data->created_at}}</h3>      </li>
        <h3>Product Image :  <img src="{{asset('product/'.$data->img)}}" width alt=""></h3>
       
    </ul>
</body>
</html>