<?php

////// Set arabic fonts in pdf ... VIDEO Link :https://www.youtube.com/watch?v=Swy8TuA5fZw&list=PLHCU7DCP4jhxnxV4Ub4YDqWiZ061t183c&index=18
include('library/tcpdf.php');
require('fpdf186/fpdf.php');

// Récupérer les données du formulaire
// $numeroClient = ""; // Vous pouvez générer un numéro de client unique ici
$date = date('Y-m-d H:i:s'); // Récupère la date actuelle
$serviceChoisi = $_POST['service'];
// Établir une connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tickets";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Vérifier la connexion
if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

// Get the latest ticket number
$sql = 'SELECT Numero FROM tickets ORDER BY Numero DESC LIMIT 1';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $latestTicketNumber = $row['Numero'];
} else {
    $latestTicketNumber = 0;
}
// Increment the ticket number
// Retrieve the selected service and current date
$newTicketNumber = $latestTicketNumber +1;

// Insérer les données dans la table "tickets"
$sql = "INSERT INTO tickets (Numero, date, service) VALUES ('$newTicketNumber', '$date', '$serviceChoisi')";
if (mysqli_query($conn, $sql)) {
   
   
//     // Générer le fichier PDF
$pdf = new TCPDF('P', 'mm', array(90,110));
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();
$pdf->SetY(25);


// Add logo
// Tcpdf support jpg and not png
// Add a page
$pdf->Image('logo.jpg', 32, 0, 25, 0, 'JPG'); // Adjust the position and size as needed

// Text: مرحبا
$pdf->Ln();
$pdf->SetFont('freeserif', 'B', 14);
$pdf->Cell(0, 10, 'مرحبا بكم', 0, 1, 'C');
$pdf->Ln();
// Text: رقم التذكرة
$pdf->SetFont('freeserif', '', 8);
$pdf->Cell(0, 10, 'رقم التذكرة   : ' . $newTicketNumber, 0, 1, 'R');

// Text: نوع الخدمة
$pdf->Cell(0, 10, 'نوع الخدمة   : ' . $serviceChoisi, 0, 1, 'R');
$pdf->Ln(10);

// Text: Date
$pdf->SetFont('freeserif', '', 8);

$pdf->Cell(0, 10, $date, 0, 0, 'L');
$pdf->SetFont('freeserif', 'B', 8);
// Text: Redal مركز
    
$pdf->Cell(0, 10, ' مركز ريضال ', 0, 0, 'R');




$pdf->Output();
// Fermer la connexion à la base de données
mysqli_close($conn);
}
?>

