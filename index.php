<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <link rel="stylesheet"
          href="style.css">
    <title>Things 3 View</title>
</head>
<body>
<h1>Things3 View</h1>
<p>Please choose your file.</p>
<?php

$arrEntries = [];

if ($handle = opendir('./files')) {

    while (false !== ($entry = readdir($handle))) {
        if($entry != '.' && $entry != '..')
        {
            $arrEntries[] = $entry;
        }
    }

    closedir($handle);
}

echo '<ul>';
foreach($arrEntries as $strEntry)
{
    echo '<li><a href="show.php?file='.urlencode($strEntry).'">'.$strEntry.'</a></li>';
}
echo '</ul>';


?>
</body>
</html>
<?php

