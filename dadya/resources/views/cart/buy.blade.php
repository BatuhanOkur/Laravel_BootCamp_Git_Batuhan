@extends('layouts.app')
@section('title')
    Siparişi Tamamla
@endsection

@section('style')
    .row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
    }

    .col-25 {
    -ms-flex: 25%; /* IE10 */
    flex: 25%;
    }

    .col-50 {
    -ms-flex: 50%; /* IE10 */
    flex: 50%;
    }

    .col-75 {
    -ms-flex: 75%; /* IE10 */
    flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
    padding: 0 16px;
    }

    .form-container {
    background-color: #f2f2f2;
    padding: 5px 20px 15px 20px;
    border: 1px solid lightgrey;
    border-radius: 3px;
    }

    input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
    }

    label {
    margin-bottom: 10px;
    display: block;
    }

    .icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
    }

    .btn {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
    }

    .btn:hover {
    background-color: #45a049;
    }

    span.price {
    float: right;
    color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
    .row {
    flex-direction: column-reverse;
    }
    .col-25 {
    margin-bottom: 20px;
    }
    }
@endsection

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-75">
                        <div class="form-container">
                            <form action="{{route('buy.items')}}" method="post">

                                <div class="row">
                                    <div class="col-50">
                                        <h3>Billing Address</h3>
                                        <label for="fname"><i class="fa fa-user"></i> Adınız Soyadınız</label>
                                        <input type="text" id="fname" name="firstname" placeholder="Batuhan Okur">
                                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                        <input type="text" id="email" name="email" placeholder="dadya@example.com">
                                        <label for="adr"><i class="fa fa-address-card-o"></i> Fatura Adresi</label>
                                        <input type="text" id="adr" name="address" placeholder="XX Mah., XX Sok., No/Apt XX,Daire XX">
                                        <label for="city"><i class="fa fa-institution"></i> City</label>
                                        <input type="text" id="city" name="city" placeholder="İstanbul">

                                    </div>

                                    <div class="col-50">
                                        <h3>Payment</h3>
                                        <label for="fname">Accepted Cards</label>
                                        <div class="icon-container">
                                            <i class="fab fa-cc-visa" style="color:navy;"></i>
                                            <i class="fab fa-cc-amex" style="color:blue;"></i>
                                            <i class="fab fa-cc-mastercard" style="color:red;"></i>
                                            <i class="fab fa-cc-discover" style="color:orange;"></i>
                                        </div>
                                        <label for="cname">Kart Üzerindeki İsim</label>
                                        <input required type="text" id="cname" name="cardname" placeholder="Batuhan Okur">
                                        <label for="ccnum">Kart Numarası</label>
                                        <input required type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                        <label for="expmonth">Exp Month/Year</label>
                                        <input type="month" id="expmonth" name="expmonth" required
                                               min="2020-10" value="2020-10">


                                        <div class="row">
                                            <div class="col-50">
                                                <label for="cvv">CVV</label>
                                                <input required type="text" id="cvv" name="cvv" min="100" max="999" placeholder="352">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" value="{{$qnt}}" name="count" id="count">
                                <input type="hidden" value="{{$total}}" name="total" id="total">
                                <input type="hidden" value="@foreach($carts as $cart) {{$cart->book[0]->price}} @endforeach" name="prices" id="prices">
                                <input type="hidden" value="@foreach($carts as $cart) {{$cart->book[0]->name}} @endforeach" name="products" id="products">
                                @csrf
                                <input type="submit" value="Continue to checkout" class="btn">
                            </form>
                        </div>
                    </div>

                    <div class="col-25">
                        <div class="container">
                            <h4>Sepetim
                                <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>{{$qnt}}</b>
        </span>
                            </h4>
                            @foreach($carts as $cart)
                            <p><a href="/kitap-detay/{{$cart->book[0]->id}}">{{$cart->book[0]->name}}</a> x {{$cart->miktar}} <span class="price">{{$cart->book[0]->price*$cart->miktar}} TL</span></p>
                            @endforeach
                            <hr>
                            <p>Ödenecek Tutar <span class="price" style="color:black"><b>{{$total}} TL</b></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
