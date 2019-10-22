<?php

/**
 * Classe parsant un fichier xml et affichant les informations sous la forme
 * d'une hierarchie de texte
 */
class Parser
{
    private $path;
    private $flux;
    private $result;
    private $depth;
    private $n;
    private $titlebool;
    private $descriptionbool;
    private $linkbool;
    private $guidbool;
    private $pubDatebool;
    private $title;
    private $description;
    private $link;
    private $guid;
    private $pubDate;

    public function __construct($path,$flux)
    {
        $this->path = $path;
        $this->depth = 0;
        $this->flux = $flux;
    }

    public function getResult():array
    {
        return $this->result;
    }

    /**
     * Parse le fichier et met le resultat dans Result
     */
    public function parse()
    {
        ob_start();
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser, $this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, 'characterData');
        if (!($fp = fopen($this->path, "r"))) {
            die("could not open XML input");
        }

        while ($data = fread($fp, 4096)) {
            if (!xml_parse($xml_parser, $data, feof($fp))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
            }
        }

        $this->result = ob_get_contents();
        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }


    private function startElement($parser, $name, $attrs)
    {
//        for ($i = 0; $i < $this->depth; $i++) {
//            echo "  ";
//        }
//        echo "<p style='color:red'> $name</p>\n";
//        $this->depth++;
//        foreach ($attrs as $attribute => $text) {
//            $this->displayAttribute($attribute, $text);
//        }
        if ($name == "ITEM") {
            $this->n = new News();
        }
        if ($name == "TITLE") {
            $this->titlebool = true;
        }
        if ($name == "DESCRIPTION") {
            $this->descriptionbool = true;
        }
        if ($name == "LINK") {
            $this->linkbool = true;
        }
        if ($name == "GUID") {
            $this->guidbool = true;
        }
        if ($name == "PUBDATE") {
            $this->pubDatebool = true;
        }
    }


//    private function displayAttribute($attribute, $text)
//    {
//        for ($i = 0; $i < $this->depth; $i++) {
//            echo "  ";
//        }
//
//        echo "A - $attribute = $text\n";
//    }


    private function endElement($parser, $name)
    {
//        $this->depth--;
//        echo "<p style='color:red'> $name</p>\n";

        if ($name == "ITEM") {
            $m = new Modele();
            if ($m->checkNews($this->guid)) {
                $m->addNews($this->title, $this->description, $this->link, $this->guid, $this->pubDate,$this->flux);
            }
            else{
                echo "News déjà présente dans la BD";
            }
        }
        if ($name == "TITLE") {
            $this->titlebool = false;
        }
        if ($name == "DESCRIPTION") {
            $this->descriptionbool = false;
        }
        if ($name == "LINK") {
            $this->linkbool = false;
        }
        if ($name == "GUID") {
            $this->guidbool = false;
        }
        if ($name == "PUBDATE") {
            $this->pubDatebool = false;
        }

    }

    private function characterData($parser, $data)
    {
//        $data = trim($data);
//
//        if (strlen($data) > 0) {
//            for ($i = 0; $i < $this->depth; $i++) {
//                echo "  ";
//            }
//
//            echo 'T :' . $data . "\n";
//        }
        if ($this->titlebool == true) {
            $search=array("%Ã©%", "%Ã´%", "%Â«%", "%Â»%", "%Ã%", "%Ãª%", "%Ã§%", "%Ã¹%", "%Ã®%");
            $replace=array("%é%", "%ô%", "%<<%", "%>>%", "%à%", "%è%", "%ç%", "%ù%", "%î%");
            $dataC=str_replace($search,$replace,$data);
            $this->title = $dataC;
        }
        if ($this->descriptionbool == true) {
            $search=array("%Ã©%", "%Ã´%", "%Â«%", "%Â»%", "%Ã%", "%Ãª%", "%Ã§%", "%Ã¹%", "%Ã®%");
            $replace=array("%é%", "%ô%", "%<<%", "%>>%", "%à%", "%è%", "%ç%", "%ù%", "%î%");
            $dataC=str_replace($search,$replace,$data);
            $this->description = $dataC;
        }
        if ($this->linkbool == true) {
            $this->link = $data;
        }
        if ($this->guidbool == true) {
            $this->guid = $data;
        }
        if ($this->pubDatebool == true) {
            $this->pubDate = $data;
        }
    }
}

?>