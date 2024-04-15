<?php

require_once('app/models/Employee/StationModel.php');

class StationController{

public function addStation(){
    session_start();

    // Include the form view
    include('app/views/Admin/station_add.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        $station_name = $_POST["station_name"];
        $lineId = $_POST["lineId"];

        $stationModel = new StationModel();

        $result = $stationModel->createStation($station_name, $lineId);

        if ($result) {
            echo '<script>alert("Station Created Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
            exit();
        } else {
            echo '<script>alert("Error: Station creation failed. Make sure the Station details are valid.");</script>';
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle the case where form data is submitted but incomplete
        echo '<script>alert("Error: Incomplete form submission.");</script>';
    }

}
public function searchStations() {
    // Load the view for admin to search
    include('app/views/Admin/ad_station_search.php');
}
public function fetchStations() {
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lineId = $_POST["lineId"];

        // Fetch stations by lineId
        $stationModel = new StationModel();
        $stations = $stationModel->getStationsByLineId($lineId);

        // Display the stations 
        include('app/views/Admin/allstations.php');
      
    } else {
        // Handle the case where form data is not properly submitted
        echo '<script>alert("Error: Invalid request.");</script>';
    }
}
public function updateStation() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $station_id = $_POST["station_id"];
        $station_name = $_POST["station_name"];
        $lineId = $_POST["lineId"];

        $stationModel = new StationModel();

        $result = $stationModel->updateStation($station_id, $station_name, $lineId);

        if ($result) {
            echo '<script>alert("Station Updated Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
            exit();
        } else {
            echo '<script>alert("Error: Station update failed. Make sure the Station details are valid.");</script>';
        }
    } else {
        echo '<script>alert("Error: Invalid request.");</script>';
    }
}

public function deleteStation() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $station_id = $_POST["station_id"];

        $stationModel = new StationModel();

        $result = $stationModel->deleteStation($station_id);

        if ($result) {
            echo '<script>alert("Station Deleted Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
            exit();
        } else {
            echo '<script>alert("Error: Station deletion failed.");</script>';
        }
    } else {
        echo '<script>alert("Error: Invalid request.");</script>';
    }
}




}