@extends('layouts.app')

@section('content')
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
    </form>
</div>
</div>
@endsection

