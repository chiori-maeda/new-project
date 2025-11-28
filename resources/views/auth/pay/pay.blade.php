@extends('layouts.app')
 
@section('title', 'buy')
 
@section('content')

    <div class="mt-2 border border-2 rounded p-4">
      <h3 class="text-secondary">Confirm Your Order</h3>

      <h4 class="text-secondary">Total Amount:{{ $cost }}</h4>
        <form action="" method="POST">
          @csrf
          <label for="shipping-adress" class="form-controll text-secondary" >Shipping Adress</label>
          <input type="text" name="shipping_adress" id="shipping-adress" class="form-control" placeholder="Enter the delivery address." value="{{ $shipping_address }}">

          <p><i class="fa-solid fa-circle-exclamation"></i>Payment can only be made in cash at an ATM</p>

          <button type="submit" class="btn btn-danger">buy</button>

          
        </form>
        


    </div>
@endsection
 