document.addEventListener('DOMContentLoaded', function () {
    var stationPrices = {
        "Panadura->Colombo Fort": { "1": 120, "2": 80, "3": 60 },
        "Panadura->Moratuwa": { "1": 60, "2": 40, "3": 30 },
        "Panadura->Dehiwala": { "1": 70, "2": 45, "3": 35 },
        "Panadura->MountLavinia": { "1": 80, "2": 50, "3": 45 },
        "Panadura->Wellawatta": { "1": 85, "2": 55, "3": 50 },
        "Panadura->Bambalapitiya": { "1": 90, "2": 60, "3": 55 },
        "Panadura->,Kollupitiya": { "1": 100, "2": 65, "3": 60 },

        // Add more station pairs as needed
    };

    // Add change event listener to all train class select elements
    var classSelects = document.querySelectorAll('.train-class');
    classSelects.forEach(function (select) {
        select.addEventListener('change', updateTicketPrices);
    });

    function updateTicketPrices() {
        // Get selected departure and destination stations
        var departureStation = this.getAttribute('data-departure');
        var destinationStation = this.getAttribute('data-destination');

        // Update ticket prices for all classes
        for (var i = 1; i <= 3; i++) {
            var priceCell = document.querySelector('.class-' + i + '-price');
            if (priceCell) {
                var calculatedPrice = stationPrices[departureStation + '->' + destinationStation][i] || 0;
                priceCell.textContent = 'RS ' + calculatedPrice;
            }
        }

        // Show the price table
        document.querySelector('.ticket-prices').style.display = 'block';
    }
});