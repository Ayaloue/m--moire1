<!DOCTYPE html>
 <html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Le meilleurs conseils pour l'électroménager">
<meta name="keyword" content="électroménager,conseils, meilleurs conseils">
<link rel="stylesheet" href="style.css">
<title>page 3</title>
</head>
<body> 
  <?php 
  $id = $_GET["id"];
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=demo","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo"<br>";
    $pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
  }catch(PDOException $e){
   die("error:could not connect". $e->getMessage());
  }
  // Requête pour récupérer les produits avec leurs marques et caractéristiques
  $sql = "SELECT * FROM `produit` where idP =".$id;
  
  $result = $pdo->query($sql);
  $produit = $result->fetch(); 
  ?>
    <section class="aya">
  <center>
    <h1>Electronic</h1>
    <h2>Frigidaire LG</h2>
  </center>
  <div style="display: grid; place-items:end;"> 
  <fieldset>
    <legend><?php echo $produit["Nom"]?></legend>
    <p>comporte 2 porte ,124 L,
      780*1800*730
    </p>
    <h3>Le point vente :sharp elctronic Annaba </h3>
    <p>L'adresse :6 Rue jean jaures,annaba</p>
    <p>Le prix:204.900DA</p>
  <h4>Le point vente:Tech Store  </h4>
  <p>L'adresse :VQV2+8HM,Av,Bouali Said,Annaba</p>
    <p>Le prix:200.000DA</p>
    <h5>Le point vente:BOUALLEG électroménager ANNABA </h5>
  <p>L'adresse :WQ23+QHF?Rue Bouzerad hocine,Annaba/p>
    <p>Le prix:210.100DA</p>
    
</fieldset></div>
    <button class="button1"style="border: none;">
        <a href="code2.html?"> <img src="xamppayaa/htdocs/projet/les_produit/chauffeur-eau/x21.png" </a>   </button>
       
    
    </body>
</html>