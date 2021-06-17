@extends('emailLayouts.default')
@section('title', ' مرحبا ' . $firstName)
@section('body')
    <tbody>
    <tr>
        <td style="font:14px/25px arial; color:#333; padding: 24px 0 35px;">

            <p>{{ $subject }}</p>
            <br />
            <a href="{{ $content }}" target="_blank">تغيير كلمة المرور</a>
            <p>فريق {{ \App\Models\Variable::getVar('العنوان عربي') }} | بزنس برو</p>
        </td>
    </tr>
    </tbody>
@stop
