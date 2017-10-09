<?php
    $var="-péron-de - la         branche-";

    if(preg_match('/[a-zA-Z]/',$var)){
        $var2=RemplacerEspaceAvecTir($var);
        $var2=MajusculePremier($var);
        echo $var2;
    }else{
        echo "pas de charactères connard";
    }



    function Majuscule($var)
    {
        return strtoupper ( $var) ;
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

    function EnleverUnAccent($var,$num)
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

    function MajusculePremier($var)
    {
        //FAIRE APRES ENLEVER DOUBLE ESPACE, TIRETS ET ACCENTS!!!

        $var=mb_strtolower($var);
        $y=-1;
        do{
            $y++;
        }while($var[$y]=='-'||$var[$y]==' '||$var[$y]=='_'||$var[$y]=='\'');
        echo $y."<br>";
        $var1=$var;
        $var=EnleverUnAccent($var,$y);
        $var=mb_substr($var1,0,$y).mb_strtoupper ( $var[$y]).mb_substr($var,$y+1);
        $i=$y+1;
        do{
            if($var[$i]=='-'||$var[$i]==' '||$var[$i]=='_'||$var[$i]=='\''){
                if(isset($var[$i+1])){
                    $var=EnleverUnAccent($var,$i);
                    $var[$i+1]=mb_strtoupper ( $var[$i+1]);
                }

            }
            $i++;
        }while($i<strlen($var));
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

    function RemplacerEspaceAvecTir($var){
        $var = str_replace(' - ', '-', $var);
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
