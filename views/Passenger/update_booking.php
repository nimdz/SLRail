<?php
require_once 'models/BookingModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $booking_id = $_POST['booking_id'];
    $departure_station = $_POST['departure_station'];
    $destination_station = $_POST['destination_station'];
    $departure_date = $_POST['departure_date'];
    $number_of_passengers = $_POST['number_of_passengers'];

    // Create an instance of BookingModel
    $bookingModel = new BookingModel();

    // Call the updateBooking method
    $updateResult = $bookingModel->updateBooking($booking_id, $departure_station, $destination_station, $departure_date, $number_of_passengers);

    if ($updateResult) {
        // Update successful, redirect to the bookings page
        header('Location: allbookings.php');
        exit();
    } else {
        // Update failed
        echo "Error: Update failed.";
    }
}
