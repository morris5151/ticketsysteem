@extends('layouts.base')

@section('content')
<div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
   
<table class="table" style="background-color:  white; border:solid black;">
        <thead>
            <th>Events</th>
            <th>Start datum</th>
            <th>Eind datum</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    
                    
                    <td>{{$event->name}}</td>
                    <td>{{date_format(date_create($event->event_start), "d/M/Y")}}</td>
                    <td>{{date_format(date_create($event->event_end), "d/M/Y")}}</td>
                    <td>
                        <h3><a class ="" style="background-color:black; color:white; text-transform:uppercase; text-decoration: none; padding:10px; font-size:15px;" id="delete" href={{route('delete_event', $event->id)}}>delete event</a></h3>
                        <h3><a class =""  style="background-color:white; border:solid black; border-radius:0; color:black; text-transform:uppercase; text-decoration: none; padding:10px; font-size:15px;" id="change" href={{route('edit_event', $event->id)}}>change event</a></h3>
                    </td>
                    
                   
                </tr>
                 
                
            @endforeach

        </tbody>
    </table>

@endsection
