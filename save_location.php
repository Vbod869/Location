<?php
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['latitude']) && isset($data['longitude'])) {
    $lat = $data['latitude'];
    $lon = $data['longitude'];
    $time = date("Y-m-d H:i:s");

    $entry = "Waktu: $time | Latitude: $lat | Longitude: $lon\n";
    file_put_contents("location_log.txt", $entry, FILE_APPEND);

    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data"]);
}
?>