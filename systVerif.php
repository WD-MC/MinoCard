
<?php

    $donnees="";
    function get($donnees){
        $donnees = $_POST[$donnees];
        return $donnees;
    } 

    function dataSecurity($donnees){

        #supprime les caracteres et espace en trop
        $donnees = trim($donnees);
        #supprime les antislashs
        $donnees = stripslashes($donnees);
        #supprime les insertions des codes tels que les balises, les codes javascript
        $donnees = strip_tags($donnees);
        return $donnees;
    }

    function set($donnees){
        $donnees=dataSecurity($donnees);
        return $donnees;
    }

    function sauvegarder($donnees){

        #ouvrir le fichier en lecture et en ecriture
        $fichier = fopen("carte.txt", "a+");
        $texte =" $donnees\n";
        #ajoute du texte dans le fichier
        fwrite($fichier,$texte);
        #ferme le fichier
        fclose($fichier);
    }

    function generer(){
        #$fichier= fopen("carte.txt" ,"a+");
        #$fichier="carte.txt";
        #$file = file($fichier);
        #$afficher =@$file[0];
        #unset($file[0]);
        #file_put_contents($fichier,$file);
        #return $afficher;
        
        #ouvrir le fichier
        
        $fichier ="carte.txt";
        if(file_exists($fichier)){
            #ouvrir en lecture
            $hfichier = fopen($fichier, "r");
            #creer le tableau
            $content = array();
            #compter le nombre de ligne du fichier
            $nbligne= count(file($fichier));

            for ($i=0; $i <$nbligne ; $i++) {
                #lire le fichier 
                $line = fgets($hfichier);
                #ajouter un element dans le tableau
                array_push($content, $line);
            }
            #fermeture du fichier
            fclose($hfichier);
            #retourne le tableau
        }
        return $content;
    }

    function deleteFile(){
        $fichier ="carte.txt";
        if(file_exists($fichier)){
            unlink($fichier);
        }
    }

?>