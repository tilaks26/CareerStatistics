@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Contact Us</h1>
            <hr>
            <form action="{{ url('contact') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="name">Name:</label>
                    <input id="name" name="name" class="form-control">
                </div>
                <div>
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>
                <div>
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
                </div>
                <input type="submit" value="Send" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
@endsection