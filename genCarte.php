<!--script defer src = "photo.js"></!--script>
<?php
    require("systVerif.php");
    $tab = generer();
    $host = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "minocard";
    $db_port = "3308";

    // Connexion à la BDD (à personnaliser)
    //$link = mysqli_connect($host,$db_username,$db_password,$db_name, $db_port);
    // Si base de données en UTF-8, il faudra utiliser la fonction utf8_decode() pour tous les champs de texte à afficher

    // extraction des données à afficher dans le sous-titre (nom du voyageur et dates de son voyage)
    //$requete = "SELECT * FROM dataid WHERE prenom='Nora'";
    //$result = mysqli_query($link, $requete);
    // tableau des résultats de la ligne > $data_voyageur['nom_champ']
    //$data_voyageur = mysqli_fetch_array($result);
    //mysqli_free_result($result);

    // Appel de la librairie FPDF
    require("fpdf/fpdf.php");

    // Création de la class PDF
    class PDF extends FPDF {

        // Footer
        function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Helvetica','I',9);
        // Numéro de page, centré (C)
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

    }

    // On active la classe une fois pour toutes les pages suivantes
    // Format portrait (>P) ou paysage (>L), en mm (ou en points > pts), A4 (ou A5, etc.)
    $pdf = new PDF('P','mm','A4');

    // Nouvelle page A4 (incluant ici logo, titre et pied de page)
    $pdf->AddPage();
    // Polices par défaut : Helvetica taille 9
    $pdf->SetFont('Helvetica','',9);
    // Couleur par défaut : noir
    $pdf->SetTextColor(0);
    // Compteur de pages {nb}
    $pdf->AliasNbPages();

    
    
    //$column_width = ($pdf->GetPageWidth()+180)/2;
    //$pdf->Cell($column_width,-210,"REPUBLIQUE DU CAMEROUN",'Ltrb',0,'R');
    // Sous-titre calées à gauche, texte gras (Bold), police de caractère 11
    $pdf->SetFont('Helvetica','B',11);
    // couleur de fond de la cellule : gris clair
    $pdf->setFillColor(230,230,230);
    // Cellule avec les données du sous-titre sur 2 lignes, pas de bordure mais couleur de fond grise
    //$pdf->Cell(75,6,'DU '.$data_voyageur['idDemande'].' AU '.$data_voyageur['typecarte'],0,1,'L',1);    
    //$pdf->Cell(75,6,strtoupper(utf8_decode($data_voyageur['prenom'].' '.$data_voyageur['nom'])),0,1,'L',1);        
    //$pdf->Ln(10); // saut de ligne 10mm

    function fr_table($position_fr) {
        global $pdf;
        $pdf->SetDrawColor(183); // Couleur du fond RVB
        $pdf->SetFillColor(255); // Couleur des filets RVB
        $pdf->SetTextColor(0); // Couleur du texte noir
        $pdf->SetFontSize(10);
        $pdf->SetY($position_fr);
        
        // position de colonne 1 (10mm à gauche)  
        $pdf->SetX(10);
        $pdf->Cell(60,8,'REPUBLIQUE DU CAMEROUN',0,1,'C',1);  // 60 >largeur colonne, 8 >hauteur colonne
        $pdf->Cell(60,8,'Paix-Travail-Patrie',0,1,'C',1);
        $pdf->Cell(60,8,'--------',0,1,'C',1);
        $pdf->Cell(60,8,'PRESIDENCE DE LA REPUBLIQUE',0,1,'C',1);
        $pdf->Cell(60,8,'--------',0,1,'C',1);
        $pdf->Cell(60,8,'DELEGATION GENERALE A',0,1,'C',1);
        $pdf->Cell(60,8,'LA SURETE NATIONALE',0,1,'C',1);
        
        $pdf->Image('images/repcameroun.JPG',95,10);
        
        $pdf->Ln(); // Retour à la ligne
    }

    function eng_table($position_eng) {
        global $pdf;
        $pdf->SetDrawColor(183); // Couleur du fond RVB
        $pdf->SetFillColor(255); // Couleur des filets RVB
        $pdf->SetTextColor(0); // Couleur du texte noir
        $pdf->SetFontSize(10);
        $pdf->SetY($position_eng);

        // position de la colonne 3 (130 = 70+60)
        $pdf->SetX(155); 
        $pdf->Cell(30,8,'REPUBLIC OF CAMEROON',0,1,'C',1);
        $pdf->SetX(155);
        $pdf->Cell(30,8,'Peace-Work-Fatherland',0,1,'C',1);
        $pdf->SetX(155);
        $pdf->Cell(30,8,'--------',0,1,'C',1);
        $pdf->SetX(155);
        $pdf->Cell(30,8,'PRESIDENCY OF THE REPUBLIC',0,1,'C',1);
        $pdf->SetX(155);
        $pdf->Cell(30,8,'--------',0,1,'C',1);
        $pdf->SetX(155);
        $pdf->Cell(30,8,'GENERAL DELEGATION FOR ',0,1,'C',1);
        $pdf->SetX(155);
        $pdf->Cell(30,8,'NATIONAL SECURITY',0,1,'C',1);
        
        $pdf->Ln(); // Retour à la ligne
    }

    // Fonction en-tête des tableaux en 3 colonnes de largeurs variables
    function infos_dem($position_inf,$tab) {
        global $pdf;
        $pdf->SetDrawColor(183); // Couleur du fond RVB
        $pdf->SetFillColor(221); // Couleur des filets RVB
        $pdf->SetTextColor(0); // Couleur du texte noir
        $pdf->SetFontSize(15);
        $pdf->SetY($position_inf);

        $pdf->Image('images/femme.png',5,70,50);

        // position de la colonne 2 (70 = 10+60)
        $pdf->SetX(70); 
        $pdf->Cell(125,8,'Infos Demande',1,1,'L',1);
        $pdf->SetX(70);
        $pdf->SetFontSize(12);
        $pdf->Cell(60,8,'Type de carte :'.$tab[0],0,1,'L',0);
        $pdf->SetX(70);
        $pdf->Cell(60,8,'Type de Demande :'.$tab[1],0,1,'L',0);
        $pdf->SetX(70);
        $pdf->Cell(60,8,"Poste d' Identification :".$tab[2],0,1,'L',0);
        
        $pdf->Ln(); // Retour à la ligne
    }

    // Fonction en-tête des tableaux en 3 colonnes de largeurs variables
    function identite($position_id,$tab) {

        global $pdf;
        $pdf->SetDrawColor(183); // Couleur du fond RVB
        $pdf->SetFillColor(221); // Couleur des filets RVB
        $pdf->SetTextColor(0); // Couleur du texte noir
        $pdf->SetFontSize(15);
        $pdf->SetY($position_id);
        // position de colonne 1 (10mm à gauche)  
        $pdf->SetX(15);
        $pdf->Cell(80,8,utf8_decode('Identité'),1,0,'L',1);

        $pdf->SetX(115);
        $pdf->Cell(80,8,'Naissance && Residence',1,1,'L',1);

        $pdf->SetX(15);
        $pdf->SetFontSize(12);
        $pdf->Cell(80,8,'Nom : '.$tab[3],0,0,'L',0);
        $pdf->SetX(115);
        $pdf->Cell(80,8,'Date de Naissance : '.$tab[9],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,'Prenom : '.(utf8_decode($tab[4])),0,0,'L',0);
        $pdf->SetX(115);
        $pdf->Cell(80,8,'Lieu de Naissance : '.$tab[10],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,'Sexe : '.$tab[5],0,0,'L',0);
        $pdf->SetX(115);
        $pdf->Cell(80,8,'Pays de Residence : '.$tab[11],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,'Taille: '.$tab[6],0,0,'L',0);
        $pdf->SetX(115);
        $pdf->Cell(80,8,'Lieu de Residence : '.$tab[12],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,'Nationalite : '.$tab[7],0,0,'L',0);
        $pdf->SetX(115);
        $pdf->Cell(80,8,'Numero de Telephone : '.$tab[13],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,'Profession : '.$tab[8],0,1,'L',0);

        
        $pdf->Ln(); // Retour à la ligne
    }

    function parents($position_par,$tab){

        global $pdf;
        $pdf->SetDrawColor(183); // Couleur du fond RVB
        $pdf->SetFillColor(221); // Couleur des filets RVB
        $pdf->SetTextColor(0); // Couleur du texte noir
        $pdf->SetFontSize(15);
        $pdf->SetY($position_par);

        $pdf->SetX(15);
        $pdf->Cell(180,8,'Parents',1,1,'L',1);

        $pdf->SetX(15);
        $pdf->SetFontSize(12);
        $pdf->Cell(80,8,'Nom du pere : '.$tab[14],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,'Date de Naissance du pere : '.$tab[15],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,'Nom de la mere : '.$tab[16],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,'Date de Naissance de la Mere : '.$tab[17],0,1,'L',0);

        $pdf->SetX(15);
        $pdf->Cell(80,8,"Nom de l'officier d'enrollement : ".$tab[18],0,1,'L',0);

        $pdf->Ln(); // Retour à la ligne
    }

    function sign($pos){

        global $pdf;
        $pdf->SetDrawColor(183); // Couleur du fond RVB
        $pdf->SetFillColor(221); // Couleur des filets RVB
        $pdf->SetTextColor(0); // Couleur du texte noir
        $pdf->SetFontSize(15);
        $pdf->SetY($pos);

        $pdf->SetX(15);
        $pdf->Cell(80,8,"Signature de l'officier",1,0,'L',1);
        $pdf->SetX(115);
        $pdf->Cell(80,8,"Signature de l'usager",1,1,'L',1);
        $pdf->Ln();

        $pdf->SetX(15);
        $pdf->Cell(80,25,"",1,0,'C',0);

        $pdf->SetX(115);
        $pdf->Cell(80,25,"",1,1,'L',0);
    }


    // AFFICHAGE EN-TÊTE DU TABLEAU
    // Position ordonnée de l'entête en valeur absolue par rapport au sommet de la page (70 mm)
    $position_fr = 8;
    $position_eng = 8;
    $position_inf = 75;
    $position_id = 120;
    $position_par = 182;
    $pos = 235;


    // police des caractères
    $pdf->SetFont('Helvetica','',9);
    $pdf->SetTextColor(0);
    // on affiche les en-têtes du tableau
    
    fr_table($position_fr);
    eng_table($position_eng);
    infos_dem($position_inf,$tab);
    identite($position_id,$tab);
    parents($position_par,$tab);
    sign($pos);

    // affichage à l'écran...
    //$pdf->Output('test.pdf','I');
    $pdf->Output('F', 'L:\Carte.pdf');
    header("Location: Dashboard.php" );
?>