<table>
    <thead>
    <tr>
        <th>No.</th>
        <th>Date</th>
        <th>Text</th>
        <th>Location</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tweets as $i => $tweet)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $tweet->date }}</td>
            <td>{{ $tweet->text }}</td>
            <td>{{ $tweet->location }}</td>
        </tr>
    @endforeach
    </tbody>
</table>