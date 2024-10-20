<?php
// Provera akcije koja stiže iz AJAX zahteva
if (isset($_POST['action']) && $_POST['action'] == 'getById') {
    $id = $_POST['id'];
    $result = Prijava::getById($id, $conn);
    if ($result->num_rows > 0) {
        $prijava = $result->fetch_assoc();
        echo json_encode($prijava);
    }
    exit();
}

if (isset($_POST['submit']) && $_POST['submit'] == 'izmeni') {
    $id = $_POST['id_predmeta'];
    $predmet = $_POST['predmet'];
    $katedra = $_POST['katedra'];
    $sala = $_POST['sala'];
    $datum = $_POST['datum'];

    // Ažuriranje podataka o prijavi
    $result = Prijava::update($id, $predmet, $katedra, $sala, $datum, $conn);

    if ($result) {
        header('Location: home.php');
        exit();
    } else {
        echo "Neuspešno ažuriranje podataka.";
    }
}
?>