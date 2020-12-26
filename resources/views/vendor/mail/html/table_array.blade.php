<div class="table">
    <table>
        @foreach ($data as $index => $item)
            <tr>
                <td style="font-weight:bold;">{{ $index }}</td>
                <td>{!! $item !!}</td>
            </tr>
        @endforeach
    </table>
</div>
