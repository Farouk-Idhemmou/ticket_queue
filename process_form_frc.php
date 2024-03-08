<?php
require('fpdf186/fpdf.php');

// Récupérer les données du formulaire
$date = date('Y-m-d  H:i:s'); // Récupère la date actuelle
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
// Générer le fichier PDF
$pdf = new FPDF('P','mm',array(90,110)); // Set page size to a square ticket shape
$pdf->AddPage();
$pdf->SetY(25);
// syntax : Cell(largeur ,hauteur,contenu,bordure,sautez lignes à la fin,left or right)

// Logo image
$pdf->Image('logo.png', 32, 0, 25); // Adjust the position and size as needed (x,Y,Largeur)

$pdf->SetFont('Arial', 'B', 14); // B : gras
$pdf->Ln(); // Adjust the vertical position to center the text
$pdf->Cell(0, 10, 'Bienvenue', 0, 1, 'C');
$pdf->ln();

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0, 10, utf8_decode('Numéro du Ticket  : ' . $newTicketNumber), 0, 1, 'L');
$pdf->Cell(0, 10, utf8_decode('Votre Service         : ' . $serviceChoisi), 0, 1, 'L');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 10, 'Centre Redal    ', 0, 0, 'L'); // Align to the left
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0, 10, '' . $date, 0, 0, 'R'); // Align to the right

// Enregistrer le fichier PDF sur le serveur
$filename = 'ticket_' . $newTicketNumber . '.pdf';
$pdf->Output('F', $filename);

// Télécharger le fichier PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile($filename);

// Supprimer le fichier PDF du serveur
unlink($filename);
}
// Fermer la connexion à la base de données
mysqli_close($conn);
?>



