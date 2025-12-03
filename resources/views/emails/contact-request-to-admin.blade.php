@extends('emails.layouts.base')

@section('title', $title ?? config('app.name'))

@section('header', $title ?? config('app.name'))

@section('content')
    @if(!empty($greeting))
        <p style="margin:0 0 12px;font-size:16px;font-weight:bold;">
            {{ $greeting }}
        </p>
    @endif

    @if(!empty($intro))
        <p style="margin:0 0 16px;">
            {{ $intro }}
        </p>
    @endif

    @if(!empty($lines) && is_array($lines))
        <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 0 16px;">
            @foreach($lines as $label => $value)
                <tr>
                    <td style="padding:4px 0;font-weight:bold;width:120px;vertical-align:top;">
                        {{ $label }}:
                    </td>
                    <td style="padding:4px 0;vertical-align:top;">
                        {{ $value }}
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    @if(!empty($footer))
        <p style="margin:0;">
            {{ $footer }}
        </p>
    @endif
@endsection


