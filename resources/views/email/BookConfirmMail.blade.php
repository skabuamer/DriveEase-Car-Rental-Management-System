<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed</title>
</head>

<body style="margin:0; padding:0; background:#f4f4f4; font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4; padding:40px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:8px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#111827; padding:30px; text-align:center;">
                            <h1 style="color:#ffffff; margin:0;">DriveEase</h1>
                            <p style="color:#d1d5db;">Your Ride, Simplified</p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:40px 30px; color:#333;">

                            <h2>Booking Confirmed 🚗</h2>

                            <p>
                                Hi <strong>{{ $booking->user->name }}</strong>,
                            </p>

                            <p>
                                Your booking has been successfully confirmed.
                            </p>

                            <table width="100%" cellpadding="10" cellspacing="0"
                                style="border-collapse:collapse; margin-top:20px;">

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Booking ID</strong></td>
                                    <td style="border:1px solid #ddd;">{{ $booking->id }}</td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Vehicle</strong></td>
                                    <td style="border:1px solid #ddd;">{{ $booking->car->name }}</td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Pickup Date</strong></td>
                                    <td style="border:1px solid #ddd;">
                                        {{ $booking->start_date }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Return Date</strong></td>
                                    <td style="border:1px solid #ddd;">
                                        {{ $booking->end_date }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Total</strong></td>
                                    <td style="border:1px solid #ddd;">
                                        ${{ $booking->total_cost }}
                                    </td>
                                </tr>

                            </table>

                            <div style="margin-top:30px; text-align:center;">
                                <a href="{{ url('/my-bookings') }}"
                                    style="background:#2563eb; color:white; padding:14px 24px; text-decoration:none; border-radius:5px;">
                                    View Booking
                                </a>
                            </div>

                            <p style="margin-top:40px;">
                                Thank you for choosing DriveEase.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f3f4f6; padding:20px; text-align:center; font-size:13px; color:#666;">
                            © {{ date('Y') }} DriveEase. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
