@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Contact Us</h1>
            <hr>
            <form class="form-horizontal" id ="form" method="POST" action="{{ route('contact.form') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="name">Name:</label>
                    @if (Auth::user())
                        <input id="name" name="name" value="{{ Auth::user()->name }}" class="form-control">
                    @else
                        <input id="name" name="name" class="form-control">
                    @endif
                </div>
                <div>
                    <label name="email">Email:</label>
                    @if (Auth::user())
                        <input id="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                    @else
                        <input id="email" name="email" class="form-control">
                    @endif
                </div>
                <br>
                <div>
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection