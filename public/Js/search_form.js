document.addEventListener('DOMContentLoaded', function () {
    var stations = [
        "Colombo Fort", "Kandy", "Galle", "Anuradhapura", "Badulla", "Ella", "Jaffna", "Matara", "Trincomalee", "Polonnaruwa",
        "Panadura", "Moratuwa", "Mountlaviniya", "Bambalapitiya", "Jaffna", "Egoda Uyana", "Dehiwala", "Demodara", "Hikkaduwa",
        "Aluthgama", "Kalutara", "Wadduwa", "Ambalangoda", "Jaela", "Gampaha"
    ];

    function populateDropdown(elementId, cityArray) {
        var dropdown = document.getElementById(elementId);
        for (var i = 0; i < cityArray.length; i++) {
            var option = document.createElement("option");
            option.value = cityArray[i];
            option.text = cityArray[i];
            dropdown.add(option);
        }
    }

    populateDropdown("From", stations);
    populateDropdown("destination", stations);
});
