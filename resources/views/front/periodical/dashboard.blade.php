@extends('front.periodical.base')

@section('content')
    <table width="1100" align="center" id="main" border="0" cellpadding="0" cellspacing="15">
        <tbody>
        <tr>
            <td width="261" valign="top">
                @include('front.periodical.left')
            </td>
            <td valign="top" class="conneibg">
                @yield('rcon')
            </td>
        </tr>
        </tbody>
    </table>
@endsection
