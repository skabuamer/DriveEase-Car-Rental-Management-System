<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Received</title>
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
                            <h1 style="color:#ffffff; margin:0;">DriveEase Admin</h1>
                            <p style="color:#d1d5db;">New Booking Alert</p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:40px 30px; color:#333;">

                            <h2>New Booking Received 🚗</h2>

                            <p>
                                Hello Admin,
                            </p>

                            <p>
                                A new car booking has just been placed in the system.
                            </p>

                            <table width="100%" cellpadding="10" cellspacing="0"
                                style="border-collapse:collapse; margin-top:20px;">

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Booking ID</strong></td>
                                    <td style="border:1px solid #ddd;">{{ $booking->id }}</td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Customer</strong></td>
                                    <td style="border:1px solid #ddd;">{{ $booking->user->name }}</td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Email</strong></td>
                                    <td style="border:1px solid #ddd;">{{ $booking->user->email }}</td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Vehicle</strong></td>
                                    <td style="border:1px solid #ddd;">{{ $booking->car->name }}</td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Pickup Date</strong></td>
                                    <td style="border:1px solid #ddd;">{{ $booking->start_date }}</td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Return Date</strong></td>
                                    <td style="border:1px solid #ddd;">{{ $booking->end_date }}</td>
                                </tr>

                                <tr>
                                    <td style="border:1px solid #ddd;"><strong>Total</strong></td>
                                    <td style="border:1px solid #ddd;">${{ $booking->total_cost }}</td>
                                </tr>

                            </table>

                            <div style="margin-top:30px; text-align:center;">
                                <a href="{{ url('/admin/rentals/' . $booking->id) }}"
                                    style="background:#dc2626; color:white; padding:14px 24px; text-decoration:none; border-radius:5px;">
                                    View in Admin Panel
                                </a>
                            </div>

                            <p style="margin-top:40px;">
                                Please review and manage this booking accordingly.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f3f4f6; padding:20px; text-align:center; font-size:13px; color:#666;">
                            © {{ date('Y') }} DriveEase Admin System
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
