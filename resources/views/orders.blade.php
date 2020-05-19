@extends('layouts.adminapp')

@section('turinys')


    <div class="container" id="cart_sonas">
        <div class="col-lg-10 offset-lg-1">
            <table id="cart" class="table table-hover table-condensed" >
                <thead>
                <tr style="border-bottom: 0px">
                    <th style="width:15%;border-bottom: 10px;">Order ID</th>
                    <th style="width:15%;border-bottom: 10px;">Order State</th>
                    <th style="width:15%;border-bottom: 10px;">Date</th>
                    <th style="width:15%;border-bottom: 10px;">Client</th>
                    <th style="width:15%;border-bottom: 10px;">Cart ID</th>
                    <th style="width:15%;border-bottom: 10px;">Payment ID</th>
                @foreach($allUz as $asUZ)
                    <tr>
                        <td>{{ $asUZ->id_Uzsakymas }}</td>
                        <td>{{ $asUZ->Būsena }}</td>
                        <td>{{ $asUZ->Data }}</td>
                        <td>{{ $asUZ->fk_id_Klientas }}</td>
                        <td>{{ $asUZ->fk_id_krepselis }}</td>
                        <td>{{ $asUZ->fk_id_apmokejimas }}</td>
                        <td width="50"><button class="button" type="edit"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                                </svg></button></td>
                    </tr>
                    @endforeach
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
