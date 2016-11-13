<?php 
fscanf(STDIN, "%d %d %d",
    $N, // the total number of noeud in the level, including the gateways
    $L, // the number of links
    $E // the number of exit gateways
);
$noeud = null;
for ($i = 0; $i < $L; $i++) {
    fscanf(STDIN, "%d %d",
        $N1, // N1 and N2 defines a link between these noeud
        $N2
    );
    if (!isset($noeud[$N1])) {
        $noeud[$N1] = null;
    }
    $noeud[$N1][] = $N2;
    if (!isset($noeud[$N2])) { 
        $noeud[$N2] = null;
    }
    $noeud[$N2][] = $N1;
}
$sortieDuNoeud = null;
for ($i = 0; $i < $E; $i++)
{
    fscanf(STDIN, "%d",
        $EI // the index of a gateway node
    );
    $sortieDuNoeud[] = $EI;
}

while (TRUE)
{
    fscanf(STDIN, "%d", 
        $SI // The index of the node on which the Skynet agent is positioned this turn
    );
    
    $noeudExistantDec = false;
    for ($i = 0; $i < $E; $i++) {
        if (in_array($sortieDuNoeud[$i], $noeud[$SI])) {
            $noeudDecon = $sortieDuNoeud[$i];
            $noeudExistantDec = true;
        }
    }
    if (!$noeudExistantDec) {
        
        $noeudDecon = $noeud[$SI][0];
    }
    
    $noeudValid = null;
    for ($j = 0; $j < count($noeud[$SI]); $j++) {
        if ($noeud[$SI][$j] != $noeudDecon) {
            $noeudValid[] = $noeud[$SI][$j];
        }
    }
    $noeud[$SI] = $noeudValid;
    
    $noeudValid = null;
    for ($j = 0; $j < count($noeud[$noeudDecon]); $j++) {
        if ($SI != $noeudDecon) {
            $noeudValid[] = $noeud[$noeudDecon][$j];
        }
    }
    $noeud[$noeudDecon] = $noeudValid;
    
    echo "$SI $noeudDecon\n";
}