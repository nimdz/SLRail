// JavaScript function to toggle visibility of update forms
function updateBooking(bookingId) {
    var form = document.getElementById("updateForm" + bookingId);
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}
function deleteBooking(bookingId) {
if (confirm("Are you sure you want to delete this booking?")) {
// Redirect to the delete URL (you need to define this in your router)
window.location.href = "/SlRail/booking/deleteBooking?booking_id=" + bookingId;
if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}
}