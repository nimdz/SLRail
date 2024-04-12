document.addEventListener('DOMContentLoaded', function () {
    var stations = [
        "Choose Station",
        "Colombo Fort","Secretariat Halt", "Kompnnavidiya", "Kollupitiya", "Bambalapitiya", "Wellawatte", "Dehiwala", "Mount Laviniya", "Rathmalana", "Angulana", 
        "Lunawa", "Moratuwa", "Koralawella", "Egodauyana", "Panadura", "Pinwatte", "Wadduwa", "Kalutara North", "Kalutara South", "Katukurunda", 
        "Payagala North", "Payagala South", "Maggona", "Beruwala", "Hettimulla", "Aluthgama", "Bentota", "Induruwa", "Mha Induruwa", "Kosgoda", 
        "Piyagama", "Ahungalle", "Patagamgoda", "Balapitiya", "Andadola", "Kandegoda", "Ambalangoda", "Madampagama", "Akurala", "Kahawa", 
        "Telwatte", "Seenigama", "Hikkaduwa", "Thiranagama", "Kumarakanda", "Dodanduwa", "Rathgama", "Boossa", "Ginthota",
        "Maradana", "Dematagoda", "Kelaniya", "Wanawasala", "Hunupitiya", "Enderamulla", "Horape", "Ragama", "Walpola", "Batuwatte", 
        "Bulugahagoda", "Ganemulla", "Yagoda", "Gampaha", "Daraluwa", "Bemmulla", "Magelegoda", "Heendeniya", "Veyangoda", "Wandurawa", 
        "Keenawala", "Pallewala", "Ganegoda", "Wijayarajadahana", "Mihirigama", "Wilwatte", "Botale", "Abeypussa", "Yattalgoda", "Buthgamuwa", 
        "Alawwa", "Wlakubura", "Poplgahawela", "Panaleeya", "Tismalpola", "Yatagama", "Rambukkana", "Kadigamuwa", "Gangoda", "Ihalakotte", 
        "Balana", "Kadugannawa", "Pilimatalawa", "Peradeniya", "Koshinna", "Gelioya", "Gampola", "Tembligala", "Ulapone", "Nawalapitiya", 
        "Inguruoya", "Galaboda", "Watawala", "Ihalawatawala", "Rosella", "Hatton", "Kotagala", "Talawakele", "Watagoda", "Greatwestern", 
        "Radella", "Nanuoya", "Perakumpura", "Ambewela", "Pattipola", "Ohiya", "Idalgasinna", "Haputale", "Deyatalawa", "Bandarawela", 
        "Kinigama", "Heeloya", "Kitalelle", "Elle", "Demodara", "Uduwara", "Haliela", "Badulla",
        "Sarasaviuyana", "Kandy", "Mahaiyawa", "Katugastota", "Udatalawinna", "Wattegama", "Pathanpha", "Udaththawala","Maradana", "Ukuwela", "Matale"
        // Add more stations here if needed
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
    // Populate the stoppings dropdown
    populateDropdown("stoppings", stations);

        // Convert the stoppings dropdown into a multi-select dropdown with checkboxes
        var stoppingsDropdown = document.getElementById("stoppings");
        stoppingsDropdown.setAttribute("size", stations.length);
        stoppingsDropdown.setAttribute("multiple", true);
});
