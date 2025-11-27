@extends('layouts.app')
 
@section('title', 'buy')
 
@section('content')

    <div class="mt-2 border border-2 rounded p-4">
        <form action="" method="POST">
          <label for="shipping-adress" class="form-controll text-secondary" >Shipping Adress</label>
          <input type="text" name="shipping_adress" id="shipping-adress" class="form-control" placeholder="Enter the delivery address." value="{{  }}">

          <p>Payment can only be made in cash at an ATM</p>
        </form>
        


    </div>
@endsection
 