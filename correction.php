<?php
    $var="g b ";
    $var2=EnleverEspaceDebFin($var);
    echo "$var2";
    function Majuscule($var)
    {
        return strtoupper ( $var) ;
    }

    function MajusculePremier($var)
    {
        return ucfirst( $var) ;
    }

    function EnleverAccents($var, $encoding='utf-8')
    {
        // transformer les caractères accentués en entités HTML
        $var = htmlentities($var, ENT_NOQUOTES, $encoding);

        // remplacer les entités HTML pour avoir juste le premier caractères non accentués
        $var = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $var);

        // Remplacer les ligatures tel que : Œ, Æ ...
        $var = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $var);

        return $var;
    }

    function GarderA1TirApp($var){
        //FAIRE APRES ENLEVER ACCENTS!!!
        $var = preg_replace('/[^A-Za-z0-9\\\' -]/' , '', $var);
        return $var;
    }

    function RemplacerDoubleApp($var){
        $var = preg_replace('/\'+/', '\'', $var);
        return $var;
    }

    function RemplacerDoubleTir($var){
        $var = preg_replace('/-+/', '-', $var);
        return $var;
    }

    function RemplacerTripleTir($var){
        $var = preg_replace('/--+/', '--', $var);
        return $var;
    }

    function EnleverTirAppDebFin($var){
        do{
            $var= trim($var,'-\'') ;
        }while($var[0]=='-'||$var[0]=='\''||$var[strlen($var)]=='-'||$var[strlen($var)]=='\'');
        return $var;
    }

    function EnleverEspaceDebFin($var){
        do{
            $var= trim($var,' ');
        }while($var[0]==" "||$var[strlen($var)]==" ");
        return $var;
    }


?>
