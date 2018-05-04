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
<?php

if(isset($_GET['file']))
{
    $arrContent = file('files/' . urldecode($_GET['file']));
    $objHtml    = new Html();

    foreach($arrContent as $strLine)
    {
        echo $objHtml->convertToHtml($strLine);
    }
}


class Html
{

    public $boolListOpen = false;

    public function convertToHtml($strContent)
    {
        $strHtml = "";
        if(strpos($strContent, '##') !== false)
        {
            if($this->boolListOpen)
            {
                $strHtml .= '</ul>';
                $this->boolListOpen = false;
            }
            $strHtml .= '<h2>' . str_replace('##', '', $strContent) . '</h2>';
            return $strHtml;
        }
        if(strpos($strContent, '#') !== false)
        {
            if($this->boolListOpen)
            {
                $strHtml .= '</ul>';
                $this->boolListOpen = false;
            }
            $strHtml .= '<h1>' . str_replace('#', '', $strContent) . '</h1>';
            return $strHtml;
        }
        if(strpos($strContent, '- [ ] ') !== false)
        {
            if(!$this->boolListOpen)
            {
                $strHtml .= '<ul>';
                $this->boolListOpen = true;
            }
            $strHtml .= '<li>' . str_replace('- [ ] ', '', $strContent) . '</li>';
        }

        return $strHtml;
    }

}


?>
</body>
</html>
<?php

