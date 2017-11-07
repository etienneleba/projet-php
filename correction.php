<?php
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
        }
        /*y=la première lettre du mot*/
        /*on stock le mot var dans une autre variable*/
        $var1=$var;
        /*on remplace var par la premiere lettre
        et enlève l'accent sur cette première lettre*/
        $var=$this->enleverUnAccent($var,$y);
        /*var = se qu'il y a avant plus la premiere lettre plus
        ce qu'il y a après*/
        $var=mb_substr($var1,0,$y).mb_strtoupper (mb_substr($var,$y,1)).mb_substr($var,$y+1);
        /*On parcours le mot en débutant à la première lettre du mot*/
        $i=$y;
        $varSortant=mb_substr($var1,0,$y);
        do{
            $varCourant =mb_substr($var,$i,1);
            /*On test si il y a un espace tiret, apostrophe ou underscore*/
            if($varCourant=='-'||$varCourant==' '||$varCourant=='_'||$varCourant=='\''){
                $varCourantSuivant=mb_substr($var,$i+1,1);
                $varCourantSuivantSuivant=mb_substr($var,$i+2,1);
                /*Si la lettre d'après est definit*/
                if(isset($varCourantSuivant)){
                    if($varCourantSuivant=='-'){
                        $varCourantSuivantSuivant=$this->enleverAccents($varCourantSuivantSuivant);
                        /*Et on le met en majuscule*/
                        $varCourantSuivantSuivant=mb_strtoupper ( $varCourantSuivantSuivant );
                        $varSortant=$varSortant.$varCourant.$varCourantSuivant.$varCourantSuivantSuivant;
                        $i=$i+3;
                    }else{
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
            return true;
        }
        return false;
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
            }else {
                $i++;
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
        if (preg_match('/(?:(?![a-zA-Zéàçù îïêèÉÀ_\'-]).)/', $var))
        {
            return true;

        }else{
            return false;

        }
    }

    private function contientCharChelouPourLocalite($var){
        if (preg_match('/(?:(?![a-z0-9A-Zéàçù îïêèÉÀ_\'-]).)/', $var))
        {
            return true;

        }else{
            return false;

        }
    }


    private function contientTropDeChars($var){
        if (mb_strlen($var)>25)
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
            $var2=$this->enleverLigatures($var2);
            for($i=0;$i<mb_strlen($var2);$i++){
                $variable=mb_substr($var2,$i,1);
            }
            if($this->contientCharChelou($var2)||$this->contientTropDeChars($var2)){
                return false;
            }else {
                $var2=$this->enleverAccents($var2);
                /*Si il y a au moins une lettre*/
                if(preg_match('/[a-zA-ZéàçùîïêèÉÀ]/',$var2)){
                    if($this->remplacerCharSpecialPlusEspace($var2)==true){
                        return false;
                    }
                    $var2=$this->remplacerDoubleTir($var2);
                    $var2=$this->remplacerDoubleApp($var2);
                    $var2=$this->remplacerTripleTir($var2);
                    if($this->contientPlusDe2FoisDoubleTir($var2)==true){
                        return false;
                    }
                    $var2=$this->enleverEspaceDebFin($var2);
                    /*Majuscule premier enleve un accent et met en majuscule*/
                    $var2=$this->majuscule($var2);
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
            $var2=$this->enleverLigatures($var2);
            for($i=0;$i<mb_strlen($var2);$i++){
                $variable=mb_substr($var2,$i,1);
            }
            if($this->contientCharChelou($var2)||$this->contientTropDeChars($var2)){
                return '';
            }else {
                /*Si il y a au moins une lettre*/
                if(preg_match('/[a-zA-ZéàçùîïêèÉÀ]/',$var2)){
                    if($this->remplacerCharSpecialPlusEspace($var2)==true){

                        return false;
                    }
                    $var2=$this->remplacerDoubleApp($var2);
                    $var2=$this->remplacerTripleTir($var2);
                    $var2=$this->enleverEspaceDebFin($var2);
                    /*Majuscule premier enleve un accent et met en majuscule*/
                    $var2=$this->majusculePremier($var2);
                }else{
                    return '';
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
            $var2=$this->enleverLigatures($var2);
            for($i=0;$i<mb_strlen($var2);$i++){
                $variable=mb_substr($var2,$i,1);
            }
            if($this->contientCharChelouPourLocalite($var2)||$this->contientTropDeChars($var2)){
                return false;
            }else {
                $var2=$this->enleverAccents($var2);
                /*Si il y a au moins une lettre*/
                if(preg_match('/[a-zA-ZéàçùîïêèÉÀ]/',$var2)){
                    if($this->remplacerCharSpecialPlusEspace($var2)==true){
                        return false;
                    }
                    $var2=$this->remplacerDoubleTir($var2);
                    $var2=$this->remplacerDoubleApp($var2);
                    $var2=$this->remplacerTripleTir($var2);
                    $var2=$this->enleverEspaceDebFin($var2);
                    /*Majuscule premier enleve un accent et met en majuscule*/
                    $var2=$this->majuscule($var2);
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
