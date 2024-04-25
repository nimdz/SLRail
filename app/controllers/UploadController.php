<?php


require_once 'vendor/autoload.php';

use Zxing\QrReader;

class UploadController {
    public function loadForm() {
        include('app/views/TicketingOfficer/qr_upload.php');
    }

    public function decodeQRCode() {
        // Check if the form is submitted and the file is uploaded successfully
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["qr_code"])) {
            $file = $_FILES["qr_code"];
            $uploadPath = 'uploads/' . basename($file["name"]);

            // Move the uploaded file to the uploads directory
            if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                // Debug: Output the upload path
                //echo "Upload path: " . $uploadPath . "<br>";

                try {
                    // Decode the uploaded QR code
                    $decodedData = $this->decodeQRCodeFromFile($uploadPath);

                    include('app/views/TicketingOfficer/booking_details.php');
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Error: Failed to upload file.";
            }
        } else {
            echo "Error: No file uploaded.";
        }
    }

    private function decodeQRCodeFromFile($filePath) {
        // Create an instance of QrReader
        $qrReader = new QrReader($filePath);

        try {
            // Decode QR code
            $decodedData = $qrReader->text();

            return $decodedData;
        } catch (Exception $e) {
            // Handle decoding errors
            echo "Error: Failed to decode QR code. " . $e->getMessage() . "<br>";
            return false;
        }
    }
}
?>
