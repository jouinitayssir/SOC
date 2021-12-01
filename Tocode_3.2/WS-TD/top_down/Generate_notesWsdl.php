<?php
require"../php2wsdl/src/PHPClass2WSDL.php";
require"../php2wsdl/vendor/autoload.php";

$class="Notes";
$serviceURI="http://localhost:8800/mywebservices/top_down/note-server.php";
$expectedFile="notes.wsdl";

require "Notes.php";

$gen=new \PHP2WSDL\PHPClass2WSDL($class,$serviceURI);
$gen->generateWSDL();
file_put_contents($expectedFile,$gen->dump());

echo "Generated WSDL:";
echo "<a href='http://localhost:8800/mywebservices/top_down/$expectedFile'>$expectedFile</a><br/>";
?>