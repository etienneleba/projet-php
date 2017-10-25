<?php

/*
REVOIR POUR ESPACE SUPPERIEUR OU EGAL A 3
REVOIR ' ' et ''

Ébé-ébé	EBE-EBE	Ebé-Ebé
ébé-ébé	EBE-EBE	Ebé-Ebé
ébé-Ébé	EBE-EBE	Ebé-Ebé
éÉé-Ébé	EEE-EBE	Eéé-Ebé
'éÉ'é-É'bé'	'EE'E-E'BE'	'Eé'E-E'Bé'
'éæé-É'bé'	'EAEE-E'BE'	'Eaeé-E'Bé'
'éæé-É'Ŭé'	'EAEE-E'UE' Ou interdit	'Eaeé-E'Ué' Ou interdit
'é !é-É'Ŭé'	interdit	interdit
éé''éé--uù  gg	EE'EE--UU GG Ou interdit	interdit
Éééé--gg--gg	 interdit	interdit
DE LA TR€UC	interdit	interdit
DE LA TRUC	DE LA TRUC	De La Truc
ééééééééééééééééééééééééééééééééééééééééééééééé	interdit	interdit
ùùùùùùùùùùùùùùùùùùùùùùùùùùùùùù	UUUUUUUUUUUUUUUUUUUUUUUUUUUUUU	Uùùùùùùùùùùùùùùùùùùùùùùùùùùùùù
-péron-de - la   branche-	PERON-DE-LA BRANCHE	Péron-De-La Branche
'	interdit	interdit
aa—bb—cc	interdit	interdit
A' ' b	A' 'B	A' 'B A'	A'	A'
'	interdit	interdit
x	X	X
A '' b	interdit	interdit
bénard     ébert	BENARD EBERT	Bénard Ebert
ÆøœŒøñ	AEOOEOEON	Aeooeoeon
\a	interdit	interdit
\\a	interdit	interdit
b\\a	interdit	interdit
b\a	interdit	interdit



*/

$localite="étédae";
$verif=new Verification();
$prenom=$verif->verifEtCorrectionPrenom($prenom);
$nom=$verif->verifEtCorrectionNom($nom);
$localite=$verif->verifEtCorrectionLocalite($localite);
if($prenom==false){
    echo "Prénom interdit";
}else{
    echo 'Prenom: '.$prenom;
}
if($nom==false){
    echo "Nom interdit";
}else{
    echo '<br>Nom: '.$nom;
}
if($localite==false){
    echo "Localité interdit";
}else{
    echo '<br>Localité: '.$localite;
}


class Verification {
    private function majuscule($var)
    {
        return strtoupper ( $var) ;
    }

    private function enleverAccents($var, $encoding='utf-8')
    {
        // transformer les caractères accentués en entités HTML
        $var = htmlentities($var, ENT_NOQUOTES, $encoding);

        // remplacer les entités HTML pour avoir juste le premier caractères non accentués
        $var = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $var);

        // Remplacer les ligatures tel que : Œ, Æ ...
        $var = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $var);

        return $var;
    }

    private function enleverLigatures($var, $encoding='utf-8')
    {
        // transformer les caractères accentués en entités HTML
        $var = htmlentities($var, ENT_NOQUOTES);
        // Remplacer les ligatures tel que : Œ, Æ ...
        $var = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $var);

        $var = html_entity_decode($var, ENT_NOQUOTES);
        return $var;
    }

    private function enleverUnAccent($var,$num)
    {
        $var2=mb_substr($var,$num,1);
        $var3=mb_substr($var,0,$num);

        // transformer les caractères accentués en entités HTML
        $var2 = htmlentities($var2, ENT_NOQUOTES);

        // remplacer les entités HTML pour avoir juste le premier caractères non accentués
        $var2 = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1',$var2);

        // Remplacer les ligatures tel que : Œ, Æ ...
        $var2 = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $var2);

        $var=$var3.$var2.mb_substr($var,$num+1);

        return $var;
    }


    private function majusculePremier($var)
    {
        //FAIRE APRES ENLEVER DOUBLE ESPACE, TIRETS ET ACCENTS!!!
        /*Met tout en lower case*/
        $var=mb_strtolower($var);
        $y=0;
        /*on trouve la première lettre*/
        while($var[$y]=='-'||$var[$y]==' '||$var[$y]=='_'||$var[$y]=='\''){
            $y++;
/*            echo "y= ".$y."<br>";*/
        }
        /*y=la première lettre du mot*/
        /*on stock le mot var dans une autre variable*/
        $var1=$var;
        /*echo "var1= ".$var1."<br>";*/
        /*on remplace var par la premiere lettre
        et enlève l'accent sur cette première lettre*/
        $var=$this->enleverUnAccent($var,$y);
       /* echo "var= ".$var."<br>";*/
        /*var = se qu'il y a avant plus la premiere lettre plus
        ce qu'il y a après*/
        $var=mb_substr($var1,0,$y).mb_strtoupper (mb_substr($var,$y,1)).mb_substr($var,$y+1);
        /*echo "var= ".$var."<br>";*/
        /*On parcours le mot en débutant à la première lettre du mot*/
        $i=$y;
        $varSortant=mb_substr($var1,0,$y);
        do{
            /*echo "i= ".$i."<br>";*/
            $varCourant =mb_substr($var,$i,1);
            /*echo "varCourant= ".$varCourant."<br>";*/
            /*On test si il y a un espace tiret, apostrophe ou underscore*/
            if($varCourant=='-'||$varCourant==' '||$varCourant=='_'||$varCourant=='\''){
                $varCourantSuivant=mb_substr($var,$i+1,1);
                $varCourantSuivantSuivant=mb_substr($var,$i+2,1);
                /*Si la lettre d'après est definit*/
                if(isset($varCourantSuivant)){
                    if($varCourantSuivant=='-'){
                        echo'<br>ya tiret apres tiret<br>';
                        $varCourantSuivantSuivant=$this->enleverAccents($varCourantSuivantSuivant);
                        /*Et on le met en majuscule*/
                        $varCourantSuivantSuivant=mb_strtoupper ( $varCourantSuivantSuivant );
                        $varSortant=$varSortant.$varCourant.$varCourantSuivant.$varCourantSuivantSuivant;
                        $i=$i+3;
                    }else{
                        echo'<br>ya pas tiret apres tiret<br>';
                        /*On enlève l'accent sur cette lettre*/
                        $varCourantSuivant=$this->enleverAccents($varCourantSuivant);
                        /*Et on le met en majuscule*/
                        $varCourantSuivant=mb_strtoupper ( $varCourantSuivant );
                        $varSortant=$varSortant.$varCourant.$varCourantSuivant;
                        $i=$i+2;
                    }

                }
            }else {
                $varSortant=$varSortant.$varCourant;
                /*echo "varSourtant= ".$varSortant."<br>";*/
                $i++;
            }
        }while($i<mb_strlen($var));
        return $varSortant;
    }

    private function GarderA1TirApp($var){
        //FAIRE APRES ENLEVER ACCENTS!!!
        $var = preg_replace('/[^A-Za-z0-9\\\' -]/' , '', $var);
        return $var;
    }

    private function remplacerDoubleApp($var){
        $var = preg_replace('/\'+/', '\'', $var);
        return $var;
    }

    private function remplacerDoubleTir($var){
        $var = preg_replace('/--/', '-', $var);
        return $var;
    }

    private function remplacerTripleEspace($var){
        $var = preg_replace('/   +/', ' ', $var);
        return $var;
    }

    private function remplacerCharSpecialPlusEspace($var){
        $var = str_replace(' - ', '-', $var);
        $var = str_replace(' -', '-', $var);
        $var = str_replace('- ', '-', $var);
        $var = str_replace(' _ ', '_', $var);
        $var = str_replace(' _', '_', $var);
        $var = str_replace('_ ', '_', $var);
        $var = str_replace('\'\'', '\'', $var);
        if(preg_match('/ \' /', $var)||preg_match('/\' /', mb_substr($var,0,2))||preg_match('/\' /', mb_substr(strlen($var)-1,2)))
        {
            return false;
        }
    }

    private function remplacerTripleTir($var){
        $var = preg_replace('/--+/', '--', $var);
        return $var;
    }

    private function contientPlusDe2FoisDoubleTir($var){
        $i=0;
        $trouver=0;
        do{
            $varCourant =mb_substr($var,$i,1);
            /*On test si il y a un espace tiret, apostrophe ou underscore*/
            if($varCourant=='-'){
                $varCourantSuivant=mb_substr($var,$i+1,1);
                if($varCourantSuivant=='-'){
                    $trouver++;
                    $i=$i+2;
                }else {
                    $i++;
                }
            }
        }while($i<mb_strlen($var));
        if($trouver>=2){
            return true;
        }else {
            return false;
        }
    }

/*    private function enleverTirAppDebFin($var){
        while($var[0]=='-'||$var[0]=='\''||$var[mb_strlen($var)-1]=='-'||$var[mb_strlen($var)-1]=='\''){
            $var= trim($var,'-\'') ;
        }
        return $var;
    }*/

    private function enleverEspaceDebFin($var){
        do{
            $var= trim($var,' ');
        }while($var[0]==" "||$var[mb_strlen($var)-1]==" ");
        return $var;
    }

    private function contientCharChelou($var){
        echo "avant contientCharChelou: ".$var."<br>";
        if (preg_match('/(?:(?![a-zA-Zéàçù îïêèÉÀ_\'-]).)/', $var))
        {
            echo"<br>il y a des chars speciaux<br>";
            return true;

        }else{
            echo"<br>il n'y a pas de chars speciaux<br>";
            return false;

        }
    }

    private function contientCharChelouPourLocalite($var){
        echo "avant contientCharChelou: ".$var."<br>";
        if (preg_match('/(?:(?![a-z0-9A-Zéàçù îïêèÉÀ_\'-]).)/', $var))
        {
            echo"<br>il y a des chars speciaux<br>";
            return true;

        }else{
            echo"<br>il n'y a pas de chars speciaux<br>";
            return false;

        }
    }


    private function contientTropDeChars($var){
        if (mb_strlen($var)>=25)
        {
            return true;
        }else{
            return false;
        }
    }


    public function verifEtCorrectionNom($var){
        if(isset($var)&&!empty($var)){
            $var2=$var;
            $var2=$this->remplacerTripleEspace($var2);
            echo'<br>Prenom après remplacerTripleEspace: '.$var2;
            echo'<br>Prenom avant enleverLigatures: '.$var2."<br>";
            $var2=$this->enleverLigatures($var2);
            echo'<br>Prenom après enleverLigatures: '.$var2."<br>";
            for($i=0;$i<mb_strlen($var2);$i++){
                $variable=mb_substr($var2,$i,1);
                echo "charactère n".$i."= ".$variable."<br>";
            }
            if($this->contientCharChelou($var2)||$this->contientTropDeChars($var2)){
                echo"contient chars chelous <br>";
                return false;
            }else {
                $var2=$this->enleverAccents($var2);
                /*Si il y a au moins une lettre*/
                if(preg_match('/[a-zA-ZéàçùîïêèÉÀ]/',$var2)){
                    if($this->remplacerCharSpecialPlusEspace($var2)==false){
                        return false;
                    }
                    echo'<br>Prenom après remplacerCharSpecialPlusEspace: '.$var2;
                    $var2=$this->remplacerDoubleTir($var2);
                    echo'<br>Prenom après remplacerDoubleTir: '.$var2;
                    $var2=$this->remplacerDoubleApp($var2);
                    echo'<br>Prenom après remplacerDoubleApp: '.$var2;
                    $var2=$this->remplacerTripleTir($var2);
                    echo'<br>Prenom après remplacerTripleTir: '.$var2;
                    if($this->contientPlusDe2FoisDoubleTir($var2)==true){
                        return false;
                    }
                    $var2=$this->enleverEspaceDebFin($var2);
                    echo'<br>Prenom après enleverEspaceDebFin: '.$var2;
                    /*$var2=$this->enleverTirAppDebFin($var2);*/
                    echo'<br>Prenom après enleverEspaceDebFin: '.$var2;
                    /*Majuscule premier enleve un accent et met en majuscule*/
                    $var2=$this->majuscule($var2);
                    echo'<br>Prenom après majusculePremier: '.$var2.'<br>';
                }else{
                    return false;
                }
                $var=$var2;
                return $var;
            }
        }else {
            return false;
        }
    }

    public function verifEtCorrectionPrenom($var){

        if(isset($var)&&!empty($var)){
            $var2=$var;
            $var2=$this->remplacerTripleEspace($var2);
            echo'<br>Prenom après remplacerTripleEspace: '.$var2;
            echo'<br>Prenom avant enleverLigatures: '.$var2."<br>";
            $var2=$this->enleverLigatures($var2);
            echo'<br>Prenom après enleverLigatures: '.$var2."<br>";
            for($i=0;$i<mb_strlen($var2);$i++){
                $variable=mb_substr($var2,$i,1);
                echo "charactère n".$i."= ".$variable."<br>";
            }
            if($this->contientCharChelou($var2)||$this->contientTropDeChars($var2)){
                echo"contient chars chelous <br>";
                return false;
            }else {
                /*Si il y a au moins une lettre*/
                if(preg_match('/[a-zA-ZéàçùîïêèÉÀ]/',$var2)){
                    if($this->remplacerCharSpecialPlusEspace($var2)==false){
                        return false;
                    }
                    echo'<br>Prenom après remplacerCharSpecialPlusEspace: '.$var2;
                    $var2=$this->remplacerDoubleApp($var2);
                    echo'<br>Prenom après remplacerDoubleApp: '.$var2;
                    $var2=$this->remplacerTripleTir($var2);
                    echo'<br>Prenom après remplacerDoubleTir: '.$var2;
                    $var2=$this->enleverEspaceDebFin($var2);
                    echo'<br>Prenom après enleverEspaceDebFin: '.$var2;
                    /*$var2=$this->enleverTirAppDebFin($var2);*/
                    echo'<br>Prenom après enleverEspaceDebFin: '.$var2;
                    /*Majuscule premier enleve un accent et met en majuscule*/
                    $var2=$this->majusculePremier($var2);
                    echo'<br>Prenom après majusculePremier: '.$var2.'<br>';
                }else{
                    return false;
                }
                $var=$var2;
                return $var;

            }
        }else {
            return false;
        }
    }

    public function VerifEtCorrectionLocalite($var){
        if(isset($var)&&!empty($var)){
            $var2=$var;
            $var2=$this->remplacerTripleEspace($var2);
            echo'<br>Prenom après remplacerTripleEspace: '.$var2;
            echo'<br>Prenom avant enleverLigatures: '.$var2."<br>";
            $var2=$this->enleverLigatures($var2);
            echo'<br>Prenom après enleverLigatures: '.$var2."<br>";
            for($i=0;$i<mb_strlen($var2);$i++){
                $variable=mb_substr($var2,$i,1);
                echo "charactère n".$i."= ".$variable."<br>";
            }
            if($this->contientCharChelouPourLocalite($var2)||$this->contientTropDeChars($var2)){
                echo"contient chars chelous <br>";
                return false;
            }else {
                $var2=$this->enleverAccents($var2);
                /*Si il y a au moins une lettre*/
                if(preg_match('/[a-zA-ZéàçùîïêèÉÀ]/',$var2)){
                    if($this->remplacerCharSpecialPlusEspace($var2)==false){
                        return false;
                    }
                    echo'<br>Prenom après remplacerCharSpecialPlusEspace: '.$var2;
                    $var2=$this->remplacerDoubleTir($var2);
                    echo'<br>Prenom après remplacerDoubleTir: '.$var2;
                    $var2=$this->remplacerDoubleApp($var2);
                    echo'<br>Prenom après remplacerDoubleApp: '.$var2;
                    $var2=$this->remplacerTripleTir($var2);
                    echo'<br>Prenom après remplacerTripleTir: '.$var2;
                    $var2=$this->enleverEspaceDebFin($var2);
                    echo'<br>Prenom après enleverEspaceDebFin: '.$var2;
                    /*$var2=$this->enleverTirAppDebFin($var2);*/
                    echo'<br>Prenom après enleverEspaceDebFin: '.$var2;
                    /*Majuscule premier enleve un accent et met en majuscule*/
                    $var2=$this->majuscule($var2);
                    echo'<br>Prenom après majusculePremier: '.$var2.'<br>';
                }else{
                    return false;
                }
                $var=$var2;
                return $var;
            }
        }else {
            return false;
        }
    }



}


?>
