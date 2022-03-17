@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="card">
<div class="card-body">
    <h4 class="card-title"> Event </h4>
    <form action="{{(eventcreate.store)}}"  method="POST">
   
        @csrf
        <label for="name"> Description</label>
        <br>
        <textarea  name="name" id='description'cols="50" row="3"></textarea>
       </br>
       <br>
       <label for="start_time"> Start Date</label>
       <input type='date'  name='start_date'>
       </br>
       <br>
       <label for="end_time">End Date</label>
       <input type='date'  name='end_date'>
       </br>
       <input type='submit'  value='Submit'>
</div>
=======
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
>>>>>>> 02167b359c757d347d55a9b97442ac8174b79e85
</div>
@endsection
