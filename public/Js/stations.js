document.addEventListener('DOMContentLoaded', function () {
    var stations = [
        "Choose Station","Aluthgama", "Ambalangoda", "Anuradhapura", "Badulla", "Bambalapitiya", "Bandarawela", 
        "Colombo Fort", "Dematagoda", "Demodara", "Dehiwala", "Egoda Uyana", "Ella", "Galle", 
        "Gampaha", "Gampola", "Hapugoda", "Haputale", "Hatton", "Hikkaduwa", "Ja-Ela", "Jaffna", 
        "Kalutara", "Kandy", "Kelaniya", "Kotagala", "Maradana", "Matara", "Moratuwa", "Mount Lavinia", 
        "Nanu Oya", "Nawalapitiya", "Panadura", "Peradeniya", "Polgahawela", "Polonnaruwa", "Ragama", 
        "Trincomalee", "Veyangoda", "Wadduwa", "Weligama" // Assuming you want "Choose Station" to be at the end
    ];

    console.log("Stations Array:", stations);

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
    populateDropdown("stoppings", stations);
});
