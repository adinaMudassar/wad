<?php
$whitelist = ["home","dashboard","profile","group"];
$possibleUserInputs = ["homd","hom","ashboard","settings","group"];
foreach($possibleUserInputs as  $input)
{
    if(preg_grep("/^$input$/i",$whitelist))
    {
         echo $input." whitelisted\n";
}else{
    echo $input." flawed\n";
}

}