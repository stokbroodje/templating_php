<?php 
namespace Lollipop {
use ErrorException;
	Class Template{
        function template(string $uri, array $data) : string{
            /* this function takes a uri and a string array data */
            /* opens a stream to the uri specified file and stores the content in $file*/

            $filepointer = fopen($uri, "r") or die(throw new ErrorException("Unable to open file!", null, null, $uri));
            $filesize = filesize($uri);
            $file = fread($filepointer,$filesize);
            fclose($filepointer);

            $tag = "<template>";
			return $this->insert_data($tag, $filesize, $file, $data);
        }
		private function insert_data(string $tag, int $filesize, string $file, array $data):string{
			$tag_len = strlen($tag) - 1;
            $html = "";
            $c = 0;

            for($i = 0; $i < $filesize; $i++){
				if($file[$i] == "<"){
					$j = 0;
					while($i + $j < $filesize && $file[$i + $j] == $tag[$j]){
						if($j == $tag_len){
							$html .= $data[$c];
							$c++;
							break;
						}
						$j++;
					}
				}
				$html .= $file[$i];
			}
			return $html;
		}
    }
}