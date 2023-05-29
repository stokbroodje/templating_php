<?php
include "Template.php";
$uri = "template_test.html";
$data = array(	"<p> <h1>Het werkt</h1> </p>",
                "<p> <h1>Het werkt</h1> </p>",
                "<p> <h1>Het werkt</h1> </p>");

$template = new Lollipop\Template;
$html = $template->template($uri, $data);
echo $html;
?>