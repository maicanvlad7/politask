@extends('layouts.app')
@section('content')
    <main>
        <div class="container" style="margin-top: 10vh;">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 col-md-8">
                    <h1>Place an order!</h1>
                    <h4>Let us handle the work!</h4>
                    <form action="{{URL::to('place-order')}}" method="POST" class="mt-5">
                        @csrf
                        <input type="hidden" value="{{Auth::user()->id}}" name="userId">
                        <div class="form-group">
                            <label for="name">Job Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <p class="text-info">Make it as appealing as possible! This gains attention.</p>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category"  class="form-control" id="category" required>
                                <option value="Cleaning">Cleaning</option>
                                <option value="Food">Food</option>
                                <option value="Transport">Transport</option>
                                <option value="Gardening">Gardening</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start">Start Location</label>
                                    <input class="form-control" type="text" name="start" id="autocomplete">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end">End Location</label>
                                    <input class="form-control" type="text" name="end" id="autocompleteEnd">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="details">Details</label>
                                <textarea class="form-control" name="details" id="details" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <button type="submit" value="submit" class="btn btn-success">Place Order</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 text-center mt-5">
                    <p><strong>Important note!</strong> After an order is placed, taskers will be able to place bids but unless you chose a tasker for your job it will not auto-select one.</p>
                </div>
            </div>
        </div>
    </main>
@endsection
