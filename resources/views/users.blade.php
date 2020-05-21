@extends('layouts.adminapp')

@section('turinys')

    <div class="main-body-content w-100 ets-pt">
        <div class="table-responsive bg-light">
            <table class="table">
                <tr>
                    <th style="width:15%;border-bottom: 10px;">ID</th>
                    <th style="width:20%;border-bottom: 10px;">Name</th>
                    <th style="width:30%;border-bottom: 10px;">Email</th>
                    <th style="width:5%"></th>
                    <th style="width:5%"></th>
                    <th style="width:5%"></th>
                </tr>

                @foreach($allNaud as $asNaud)
                    <tr>
                    <td>{{ $asNaud->id }}</td>
                    <td>{{ $asNaud->name }}</td>
                    <td>{{ $asNaud->email }}</td>
                    <td width="50"><button class="button" type="view"><svg class="bi bi-person" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
                            </svg></button></td>
                    <td width="50"><a href="{{ route('useredit', $asNaud->id)}}"><button class="button" type="edit"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                                </svg></button></a></td>
                    <td width="50"><a onclick="return confirm('Do you really want to delete this user?')" href="{{route('deleteUser', $asNaud->id)}}"><button class="button" type="delete"><svg class="bi bi-x-square-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2zm9.854 4.854a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd"/>
                                </svg></button></a></td>
                    </tr>
                    {{--<a class="btn custom-btn2" onclick="return confirm('Ar tikrai norite istrinti si autoriu?')" href="{{route('deleteAutoriai', $asAut->id)}}" >
                        <span>Pašalinti</span>
                    </a>--}}
                @endforeach
            </table>
        </div>
    </div>

@endsection
