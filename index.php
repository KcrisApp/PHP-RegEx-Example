<!-- METODI PREG DI PHP -->

<!-- Funzione	Cosa fa
preg_match()	Esegui una corrispondenza con espressioni regolari.
preg_match_all()	Eseguire una corrispondenza di espressioni regolari globali.
preg_replace()	Eseguire una ricerca e sostituzione di espressioni regolari.
preg_grep()	Restituisce gli elementi della matrice di input che corrispondono al modello.
preg_split()	Divide una stringa in sottostringhe utilizzando un'espressione regolare.
preg_quote()	Cita i caratteri delle espressioni regolari trovati all'interno di una stringa. 
-->



<?php 

// Classi di caratteri
// Esempio 1 - Scoprire se un pattern esiste o meno in una stringa usando "preg_match()"


// RegExp	Cosa fa
// [abc]	Corrisponde a uno qualsiasi dei caratteri a, b o c.
// [^abc]	Corrisponde a qualsiasi carattere diverso da a, b o c.
// [a-z]	Corrisponde a qualsiasi carattere dalla a minuscola alla z minuscola.
// [A-Z]	Corrisponde a qualsiasi carattere dalla a maiuscola alla z maiuscola.
// [a-Z]	Corrisponde a qualsiasi carattere dalla a minuscola alla Z maiuscola.
// [0-9]	Corrisponde a una singola cifra compresa tra 0 e 9.
// [a-z0-9]	Corrisponde a un singolo carattere compreso tra aez o tra 0 e 9.



$pattern = "/ca[kf]e/";
$text = "He was eating cake in the cafe.";

if (preg_match($pattern, $text)) {
    
    echo "ESEMPIO 1<br>";
    echo "Match found!<br>";
    echo "<br>";

}else{
    echo "ESEMPIO 1<br>";
    echo "Match not found!<br>";
}

// Esempio 2 preg_match_all() per trovare tutte le corrispondenze

$matches =  preg_match_all($pattern, $text);

echo "ESEMPIO 2<br>";
echo $matches . " mathces are found.<br>";
echo "<br>";



// Classi di caratteri predefiniti


// RegExp	Cosa fa
// .	Corrisponde a qualsiasi carattere singolo tranne la nuova riga \n.
// \d	corrisponde a qualsiasi carattere numerico. Uguale a[0-9]
// \D	Corrisponde a qualsiasi carattere non numerico. Uguale a[^0-9]
// \s	Corrisponde a qualsiasi carattere di spazio vuoto (spazio, tabulazione, nuova riga o carattere di ritorno a capo). Uguale a[ \t\n\r]
// \S	Corrisponde a qualsiasi carattere diverso da spazi. Uguale a[^ \t\n\r]
// \w	Corrisponde a qualsiasi carattere della parola (definito come dalla a alla z, dalla A alla Z, da 0 a 9 e il trattino basso). Uguale a[a-zA-Z_0-9]
// \W	Corrisponde a qualsiasi carattere non alfanumerico. Uguale a[^a-zA-Z_0-9]


// ESEMPIO 3 - Sostituzioni di uno spazio con un trattino  con preg_replace()

$pattern_replace = "/\s/";

$replacement = "-";

$textReplace = "Earth revolves around\nthe\tSun";
// Replace spaces, new lines and tabs

echo "ESEMPIO 3<br>";
echo preg_replace($pattern_replace, $replacement, $textReplace);
echo "<br>";


// Quantificatori di ripetizione

// RegExp	Cosa fa
// p+	Corrisponde a una o più occorrenze della lettera p.
// p*	Corrisponde a zero o più occorrenze della lettera p.
// p?	Corrisponde a zero o una occorrenza della lettera p.
// p{2}	Corrisponde esattamente a due occorrenze della lettera p.
// p{2,3}	Trova almeno due occorrenze della lettera p, ma non più di tre occorrenze della lettera p.
// p{2,}	Corrisponde a due o più occorrenze della lettera p.
// p{,3}	Corrisponde al massimo a tre occorrenze della lettera p




//ESEMPIO 4 - Divide la stringa in virgolo, sequenza di virgole, spazi o una compbinazione di questi con "preg_split()"

$pattern_string = "/[\s,]+/";
$textTab = "My favourite colors are red, green and blue";

$parts = preg_split($pattern_string, $textTab);

// Loop through parts and display substrings

echo "<br>";
echo "ESEMPIO 4 <br>";
foreach ($parts as $part) {
    
    echo $part . "<br>";
}


// Posizione ancore

// RegExp	Cosa fa
// ^p	Corrisponde alla lettera p all'inizio di una riga.
// p$	Corrisponde alla lettera p alla fine di una riga.


// ESEMPIO 5 - Mostra solo i nome che iniziano con la lettera C

$patternName = "/^C/";
$names = array("Jhon Smith", "Clark Robinson", "Cristiano Rambo", "Silvia Rossi", "Fabio Maria");
$matchesName = preg_grep($patternName, $names);
 

echo "<br>";
echo "ESEMPIO 5 <br>";
// Loop through matches array and display matched names
foreach($matchesName as $matchName){
    echo $matchName . "<br>";
}


// Modificatori di pattern

// Modificatore	Cosa fa
// i	Rende la corrispondenza senza distinzione tra maiuscole e minuscole.
// m	Modifica il comportamento di ^e $in modo che corrisponda al limite di una nuova riga (ovvero all'inizio o alla fine di ogni riga all'interno di una stringa su più righe), invece del limite di una stringa.
// g	Esegue una corrispondenza globale, ovvero trova tutte le occorrenze.
// o	Valuta l'espressione solo una volta.
// s	Modifica il comportamento di .(punto) in modo che corrisponda a tutti i caratteri, inclusi i nuovi caratteri.
// x	Consente di utilizzare spazi e commenti all'interno di un'espressione regolare per maggiore chiarezza.

// ESEMPIO 6 -Ricerca senza distinzioni tra minuscola e maiuscola con preg_match_all()


$patternColor = "/Red/i";
$textColor = "Color red is more visible than color blue in daylight.";

$matchesColor = preg_match_all($patternColor, $textColor, $array);

echo "<br>";
echo "ESEMPIO 6 <br>";

echo $matchesColor . " matches were found.";

echo "<br>";


// ESEMPIO 7

$patternColorIm = "/^color/im";
$textColorIm = "Color red is more visible than \ncolor blue in daylight.";
$matchesIm = preg_match_all($patternColorIm, $textColorIm, $arrayIm);

echo "<br>";
echo "ESEMPIO 7 <br>";
echo $matches . " matches were found.";

echo "<br>";
// Confini delle parole
// ( \b)
// Un carattere di confine aiuta a cercare le parole che iniziano con un modello oppure che finisce per un modello


// ESEMPIO 8


$patternB = '/\bbar\w*/';
$replacementB = '<b>$0</b>';
$textB = 'Words begining with bar: bar, barattolo, banano';

echo "<br>";
echo "ESEMPIO 8 <br>";

echo preg_replace($patternB, $replacementB, $textB);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espressioni regolari</title>
</head>
<body>

<pre>

</pre>
    
</body>
</html>