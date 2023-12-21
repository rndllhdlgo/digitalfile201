<p>Hello,</p>
<p>This is the content of your email.</p>
{{-- <p>{{ $actionUrl }}.</p> --}}

{{-- <button type="button"><a href="{{ $actionUrl }}">CLICK</a></button> --}}

<table border="1">
    <thead>
        <tr>
            <th>IP ADDRESS</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($ips as $ip)
            <tr>
                <td>{{ $ip->hrms }}</td>
            </tr>
        @endforeach --}}
        <tr>
            <td>
                {{$ips->pluck('hrms')->implode(', ')}}
            </td>
        </tr>
    </tbody>
</table>