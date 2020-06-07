@extends('layouts.adminapp')

@section('turinys')

    <a href="{{action('AdminController@addProduct')}}" id="green_btn" class="btn btn-primary" style="width: 120px; margin-left: 30px">
        Add product</a>
    <ul class="col-md-3">

        @include('productsearch')

    <div class="container">
        <div class="col-lg-8 offset-lg-1" style="padding-top: 10px; margin-left: -15px">
            <table class="table table-hover table-condensed" >
                <thead>
                <tr style="border-bottom: 0px">
                    <th style="width:10%;border-bottom: 10px;">ID</th>
                    <th style="width:10%;border-bottom: 10px;">Product</th>
                    <th style="width:50%;border-bottom: 10px;">Description</th>
                    <th style="width:10%;border-bottom: 10px;">Price</th>
                    <th style="width:10%;border-bottom: 10px;">Length</th>
                    <th style="width:10%;border-bottom: 10px;">Diameter</th>
                    <th style="width:10%;border-bottom: 10px;">Tip</th>
                    <th style="width:10%;border-bottom: 10px;">Category</th>
                </tr>
                </thead>
                <tbody>
            @foreach($allPro as $asPro)
                <tr>
                    <td>{{ $asPro->id_preke }}</td>
                    <td>{{ $asPro->pavadinimas }}</td>
                    <td>{{ $asPro->aprasymas }}</td>
                    <td>{{ $asPro->kaina }}</td>
                    <td>{{ $asPro->ilgis }}</td>
                    <td>{{ $asPro->diametras }}</td>
                    <td>{{ $asPro->galiuko_aukstis }}</td>
                    @foreach($allcategory as $cat)
                    @if($cat->id_kateg === $asPro->fk_prekes_kategorija)
                    <td>{{ $cat->pavadinimas }}</td>
                    @endif
                    @endforeach
                    <td width="50"><a href="{{route('adminRoutes.productedit', $asPro->id_preke)}}"><button class="button" type="edit"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                                </svg></button></a></td>
                    <td width="50"><a onclick="return confirm('Do you really want to delete this product?')" href="{{route('adminRoutes.deleteProduct', $asPro->id_preke)}}"><button class="button" type="delete"><svg class="bi bi-x-square-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2zm9.854 4.854a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd"/>
                                </svg></button></a></td>
                </tr>
            @endforeach
            </tbody>
            </table>
            {{$allPro->appends(request()->input())->links()}}
        </div>
    </div>
    </ul>

@endsection
