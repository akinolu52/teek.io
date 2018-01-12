@extends('layout.email')

@section('preview-text')
    Hello {{ $user->name }}, your task has been completed by your assistant!
@endsection

@section('email-content')
    {{--<tr>
        <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center;">
            <p style="margin: 0;">{{ $examReviewer->name }} just dropped a comment on your exam</p>
            <p style="margin: 0;"><b>Exam Description</b> </p>
            <p style="margin: 0;">Exam title: {{ $examDescription->title }}</p>
            <p style="margin: 0;">Copy this link to check the comment {{ URL('/')."/exam/".$examDescription->id }} <br>
                or click on the button bellow to check your the comment.</p>
        </td>
    </tr>--}}
@endsection