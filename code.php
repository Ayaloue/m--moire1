
<!DOCTYPE html>
 <html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Le meilleurs conseils pour l'électroménager">
<meta name="keyword" content="électroménager,conseils, meilleurs conseils">
<link rel="stylesheet" href="style.css">
<link  href="code2.html">
<title>page2</title>
</head>
<body>
  
<center>
     
        <h1>Electronic</h1>
       
        
         <h2>choisir le produit: </h2>
        
           </center>
             <button class="button2"style="border: none;">
              <a href="code4.html"> </a>  Si tu est un fournisseur  </button>
              <center>
<?php 
try {
  $pdo = new PDO("mysql:host=localhost;dbname=demo","root","");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo"<br>";
  $pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
}catch(PDOException $e){
 die("error:could not connect". $e->getMessage());
}
// Requête pour récupérer les produits avec leurs marques et caractéristiques
$sql = "SELECT * FROM `produit`";

$result = $pdo->query($sql);

if ($result->rowCount() > 0) {
    // Afficher les produits avec leurs marques et caractéristiques
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<button class='button'style='border: none;'><a href='code3.php?id=".$row["idP"]."'> <img src='projet1/img1.png'width='270' height='150px' </a> ". $row["Nom"] ."   </button> ";
   
    }
} else {
    echo "Aucun produit trouvé.";
}
?>              
      
              </center>
             
              </body>
              </html>
              <?php

try {
    $sql ="CREATE TABLE Produit(
        idP INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        NomP VARCHAR(255)NOT NULL UNIQUE,
        prix INT NOT NULL UNIQUE
    )";
    $sql ="CREATE TABLE Fournisseur(
        idF INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        NomF VARCHAR(255)NOT NULL ,
        prenomF VARCHAR(255)NOT NULL ,
        adresseF VARCHAR (255)NOT NULL,
        emailF VARCHAR(255)NOT NULL,
        idMarque INT NOT NULL UNIQUE,
        prix INT NOT NULL UNIQUE
    )";
         $sql ="CREATE TABLE Marque(
            idMarque INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            NomMarque VARCHAR(255)NOT NULL
            )";
            $sql ="CREATE TABLE Caracteristique(
               idCaracteristique INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                info VARCHAR(255)NOT NULL 

               
                )";    
    $pdo->exec($sql);
    echo "database created";
}catch(PDOException $e){
    die("error :not connected". $e->getMessage());
}
 unset($pdo);
 if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Requête pour récupérer les produits avec leurs marques et caractéristiques
$sql = "SELECT p.nom AS NomP, m.nom AS NomMarque, c.Caracteristique AS info
        FROM Produit p
        JOIN Marque m ON p.idMarque = m.id
        JOIN Caracteristique c ON p.idCaracteristique = c.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les produits avec leurs marques et caractéristiques
    while ($row = $result->fetch_assoc()) {
        echo "<p>Produit : " . $row["NomP"] . "</p>";
        echo "<p>Marque : " . $row["NomM"] . "</p>";
        echo "<p>Caractéristique : " . $row["info"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "Aucun produit trouvé.";
}
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $produit = $_POST["produit"];
    $prix = $_POST["prix"];
    $caractiristique = $_POST["caractiristique"];
    
    // Requête d'insertion des données du fournisseur dans la base de données
    $sql = "INSERT INTO fournisseur (nom,prenom, adresse,email,produit,prix,caractiristique) VALUES ('$nom', '$prenom','$adresse', '$email','$produit', '$prix','$caractiristique')";

    if ($conn->query($sql) === TRUE) {
        echo "Le fournisseur a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du fournisseur : " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>


      
           
           
          
          

