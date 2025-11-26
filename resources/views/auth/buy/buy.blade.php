@extends('layouts.app')
 
@section('title', 'buy')
 
@section('content')

    <div class="mt-2 border border-2 rounded p-4">
        <label for="shipping-adress" class="form-controll text-secondary" >Shipping Adress</label>
        <input type="text" name="shipping_adress" id="shipping-adress">
    </div>
@endsection
 