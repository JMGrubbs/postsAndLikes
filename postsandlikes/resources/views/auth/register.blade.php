@extends('layouts.app')

@section('content')
    <div class ="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ routes('register')}}" method="post">Register</form>
        </div>
    </div>
@endsection