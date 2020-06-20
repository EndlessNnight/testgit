
@extends('front.public.inside')

@section('right-con')
    @include('front.public.type-items',['default' => $data['name']])

    <table width="690" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" valign="top">
        <tbody>
            <tr>
                <td valign="top" width="296">
                    {!!  $data['content'] !!}
                </td>
            </tr>
        </tbody>
    </table>

@endsection
