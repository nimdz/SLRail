<?php
// app/controllers/HomeController.php
require_once 'models/Home/HomeModel.php';

class HomeController {
    public function index() {
        // Create an instance of the model
        $model = new HomeModel();

        // Get data for the home page
        $data = $model->getHomePageData();

        // Load the view and pass data to it
        include 'views/home.php';
    }
}
?>
