<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->first_name }}'s Monthly Hotel Trips</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Hotel Bookings for {{ $user->first_name }} {{ $user->last_name }}</h2>
    <br><br>
    <h3>Amount Spent: ${{ $sum }}</h3>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Hotel</th>
                <th>Cost</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Details</th>
                <th>Rooms</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if($bookings->isEmpty())
                <tr>
                    <td colspan="7" style="text-align: center;">No bookings available</td>
                </tr>
            @else
                @foreach ($bookings as $trip)
                    <tr>
                        <td>{{ $trip->hotel }}</td>
                        <td>{{ formatPrice($trip->cost) }}</td>
                        <td>{{ \Carbon\Carbon::parse($trip->check_in)->format('d F, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($trip->check_out)->format('d F, Y') }}</td>
                        <td>{{ $trip->details }}</td>
                        <td>{{ $trip->room_qty }}</td>
                        <td>{{ $trip->status === 'used' ? 'Used' : 'Unused' }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
