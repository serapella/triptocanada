<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canada Trip Planner - Trips Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Trips Overview</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Region</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>Duration (days)</th>
                    <th>Confirmed Bookings</th>
                    <th>Pending Bookings</th>
                    <th>Cancelled Bookings</th>
                    <th>Total Revenue</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trips as $trip)
                <tr>
                    <td>{{ ucfirst($trip->region) }}</td>
                    <td>{{ $trip->title }}</td>
                    <td>{{ $trip->start_date->format('Y-m-d') }}</td>
                    <td>{{ $trip->duration_days }}</td>
                    <td>{{ $trip->bookings->where('status', 'confirmed')->count() }}</td>
                    <td>{{ $trip->bookings->where('status', 'pending')->count() }}</td>
                    <td>{{ $trip->bookings->where('status', 'cancelled')->count() }}</td>
                    <td>
                        C${{ number_format(
                                $trip->bookings
                                    ->where('status', 'confirmed')
                                    ->sum(function($booking) use ($trip) {
                                        return $booking->number_of_people * $trip->price_per_person;
                                    }),
                                2
                            ) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>