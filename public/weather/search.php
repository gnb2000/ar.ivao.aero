		<center>
		<form action="<?php $_PHP_SELF ?>" method="get" class="form-horizontal" role="form">
			<label>Airport</label>
			<input class="form-control" type="text" name="icao" id="inputICAO" placeholder="ICAO">
			<input type="submit" name="enviar" value="Search">
		</form>
<?php
$icao = $_GET['icao'];
$searchthis = $icao;
$matches = array();

$handle = @fopen("source/ARmetar.txt", "r");
if ($handle)
{
    while (!feof($handle))
    {
        $buffer = fgets($handle);
        if(strpos($buffer, $searchthis) !== FALSE)
            $matches[] = $buffer;
    }
    fclose($handle);
}

//show results:
print_r($matches);
?>
</center>