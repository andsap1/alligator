@extends('layouts.app')
<?php
use Illuminate\Support\Str;
?>
@section('turinys')

    <div class="search-conntainer">
        <h2>Search results</h2>
        <p>{{$preke->total()}} result(s) for "{{request()->input('search')}}":</p>
        <br>
    </div>
    @if(count($preke) === 0)
    @else
    <div class="col-lg-10 offset-lg-1">
        <table class="table table-hover table-condensed" >
            <thead>
            <tr style="border-bottom: 0px">
                <th style="width:15%;border-bottom: 10px;">Title</th>
                <th style="width:25%;border-bottom: 10px;">Description</th>
                <th style="width:5%;border-bottom: 10px;">Lenght</th>
                <th style="width:5%;border-bottom: 10px;">Diameter</th>
            </tr>
            </thead>
            <tbody>
            @foreach($preke as $prek)
                <tr>
                    <td><a href="{{ action('ShopController@openPreke', $prek->id_preke)}}">{{ $prek->pavadinimas }}</a></td>
                    <td>{{ str::limit($prek->aprasymas, 110) }}</td>
                    <td>{{ $prek->ilgis }}</td>
                    <td>{{ $prek->diametras }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$preke->appends(request()->input())->links()}}
    </div>
    @endif
@endsection
