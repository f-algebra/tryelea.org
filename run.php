<html>
<body style="font-family: monospace;">
<?php
$src = $_REQUEST['src'];
$filename = uniqid() . "-" . date(DateTime::ISO8601) . ".elea";

try {
	$file = fopen("elea/" . $filename, "w");
	fwrite($file, $src);
	fclose($file);

	$proofs = shell_exec("cd elea && ulimit -t 30 elea $filename 2>&1");
	echo nl2br($proofs);
} catch (Exception $e) {
	echo "Exception: " . $e->getMessage();
}
?>
</body>
</html>
