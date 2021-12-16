<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <title>فــــــــاتـــــــورة رقـــــــم {{ $order->id }}</title>

    

    <style>

    .invoice-box {

        max-width: 800px;

        margin: auto;

        padding: 30px;

        border: 1px solid #eee;

        box-shadow: 0 0 10px rgba(0, 0, 0, .15);

        font-size: 16px;

        line-height: 24px;

        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

        color: #555;

    }

    

    .invoice-box table {

        width: 100%;

        line-height: inherit;

        text-align: left;

    }

    

    .invoice-box table td {

        padding: 5px;

        vertical-align: top;

    }

    

    .invoice-box table tr td:nth-child(2) {

        text-align: right;

    }

    

    .invoice-box table tr.top table td {

        padding-bottom: 20px;

    }

    

    .invoice-box table tr.top table td.title {

        font-size: 45px;

        line-height: 45px;

        color: #333;

    }

    

    .invoice-box table tr.information table td {

        padding-bottom: 40px;

    }

    

    .invoice-box table tr.heading td {

        background: #eee;

        border-bottom: 1px solid #ddd;

        font-weight: bold;

    }

    

    .invoice-box table tr.details td {

        padding-bottom: 20px;

    }

    

    .invoice-box table tr.item td{

        border-bottom: 1px solid #eee;

    }

    

    .invoice-box table tr.item.last td {

        border-bottom: none;

    }

    

    .invoice-box table tr.total td:nth-child(2) {

        border-top: 2px solid #eee;

        font-weight: bold;

    }

    

    @media only screen and (max-width: 600px) {

        .invoice-box table tr.top table td {

            width: 100%;

            display: block;

            text-align: center;

        }

        

        .invoice-box table tr.information table td {

            width: 100%;

            display: block;

            text-align: center;

        }

    }

    

    /** RTL **/

    .rtl {

        direction: rtl;

        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

    }

    

    .rtl table {

        text-align: right;

    }

    

    .rtl table tr td:nth-child(2) {

        text-align: left;

    }

    </style>

</head>



<body>

    <div class="invoice-box rtl">

        <table cellpadding="0" cellspacing="0">

            <tr class="top">

                <td colspan="2">

                    <table>

                        <tr>

                            <td class="title">

                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">

                            </td>

                            

                            <td>

                                فاتورة رقم #: {{ $order->id }}<br>

                                تم إنشائها: {{ $order->created_at }}<br>

                                تاريخ الإنتهاء: {{ $order->created_at }}

                            </td>

                        </tr>

                    </table>

                </td>

            </tr>

            

            <tr class="information">

                <td colspan="2">

                    <table>

                        <tr>

                            <td>

                                {{ $settings->name}}<br>

                                {{ $settings->telephone }}<br>

                                {{ $settings->email }}

                            </td>

                            

                            <td>

                                {{ $order->user->name ?? \App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->name }}<br>

                                {{ $order->user->email ?? \App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->email }}<br>

                                {{ $order->user->mobile ?? \App\ShippingAddress::whereUserId($order->user_id)->firstOrFail()->mobile  }}

                            </td>

                        </tr>

                    </table>

                </td>

            </tr>

            

            <tr class="heading">

                <td>

                    طرية الدفع

                </td>

                

                <td>

                    التكلفة #

                </td>

            </tr>

            

            <tr class="details">

                <td>

                    الدفع عند الإستلام

                </td>

                

                <td>

                    {{ $order->total }}

                </td>

            </tr>

            

            <tr class="heading">

                <td>

                    Item

                </td>

                

                <td>

                    Price

                </td>

            </tr>



            @foreach ($order->items as $item)

       

            <tr class="item @if($loop->iteration == count($order->items)) last @endif">

                <td>

                    {{ $item->product->name }}

                </td>

                

                <td>

                    {{ $item->price*$item->qty }}

                </td>

            </tr>

            

            @endforeach

            

            

         

            

        

            

            <tr class="total">

                 

                <td></td>

                

                <td>

                   التكلفة: {{ $order->sub_total }}

                </td>

            </tr>

        </table>

    </div>

</body>

</html>