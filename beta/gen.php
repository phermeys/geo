<html><title>Output</title>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
<input type="submit" value="Home">
</form>
<?php

//get post data
$subnet = $_POST['lead'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$count = 0;

//set filename, delete old output file
$file = 'output.txt';

file_put_contents($file, '');

//set error string lol
$error = "Fuck you - invalid IP range.";

//check for invalid ip ranges
if ($b > 254 || $d > 254){ 
    exit($error);

}

if ($a > $c || $b > $d){ 
    exit($error);

}

echo "<a href='output.txt' download>Download</a> output file.<p>";

echo $subnet.".".$a.".".$b." to ".$subnet.".".$c.".".$d."<p>";	

//i needed 3 loops, in case the range was like 192.168.1.45~192.168.33.67
//otherwise the output is wrong

//this loop handles the first chunk of b up until a+1
for ($x = $b; $x <= 254; $x++) {
    //echo $subnet.'.'.$a.'.'.$x.'<br>';
    $count++;
    file_put_contents($file, $subnet.'.'.$a.'.'.$x."\r\n", FILE_APPEND | LOCK_EX);
}

//this handles a+1 ~ c-1
for ($y = $a+1; $y <= $c-1; $y++) {
    for ($x = 1; $x <= 254; $x++) {
        //echo $subnet.'.'.$y.'.'.$x.'<br>';
        $count++;
        file_put_contents($file, $subnet.'.'.$y.'.'.$x."\r\n", FILE_APPEND | LOCK_EX);
    }
} 

//this handles the last chunk of c up until d
for ($x = 0; $x <= $d; $x++) {
    //echo $subnet.'.'.$a.'.'.$x.'<br>';
    $count++;
    file_put_contents($file, $subnet.'.'.$c.'.'.$x."\r\n", FILE_APPEND | LOCK_EX);
}

//and now for some fancy but unneccessary shit

//output count of addresses - not so fancy, but kinda cool
echo '<p>'.$count.' Total IP addresses in range.<p>';

//this is kinda cool - this shows the filesize, and parses that
//into a nice human-readable value, instad of 23847 bytes or whatever
$fsize=filesize($file) ;
$oofmag=0;
while($fsize > 1024){
    $fsize = $fsize / 1024;
    $oofmag++;

}

$prefix='';

switch ($oofmag) {
    case 0:
        $prefix=' B';
        break;
    case 1:
        $prefix=' KB';
        break;
    case 2:
        $prefix=' MB';
        break;
    default:
        exit("Error: File size will not exceed about 1mb.");
}

$fsizes = number_format($fsize, 2);

echo 'Filesize: '.$fsizes.$prefix.'<p>';

//ok, thats it. w00t
?>
<p>

<form action="index.php" method="post" enctype="multipart/form-data">
<input type="submit" value="Home">
</form>

</body></html>
