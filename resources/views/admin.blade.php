@extends('layouts.adminapp')

@section('turinys')

    <a href="{{action('AdminController@addCategory')}}" id="green_btn" class="btn btn-primary" style="width: 120px; margin-left: 20px;">
        Add category</a>
    </br>
    @foreach($allcategories as $category)
        <div class="col-md-3">
            <div class="card item">
                <a href="{{ action('ShopController@getCategory', $category->id_kateg)}}" class="text-body">
                    </br>
                    <div style="text-align: center"><h10>{{ $category->pavadinimas }}</h10></div>
                    </br>
                    <a onclick="return confirm('Do you really want to delete this category?')" href="{{ action('AdminController@deleteCategory', $category->id_kateg)}}" id="green_btn" style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
                        Delete</a>
                </a>
            </div>
        </div>
    @endforeach

@endsection
