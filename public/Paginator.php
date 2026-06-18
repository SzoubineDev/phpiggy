<?php

declare(strict_types=1);

class Paginator
{
    private int $maxPages;
    private int $linksNumber;
    private string $SelectedLinkStyle;
    private string $linkStyle;
    private string  $quickButtonStyle;
    private array $quickButtons = [];
    //setters
    public function setMaxPages(int $max)
    {
        $this->maxPages = $max;
    }
    public function setLinksNumber(int $linksNumber)
    {
        $this->linksNumber = $linksNumber;
    }
    public function setSelectedLinkStyle(string $SelectedLinkStyle)
    {
        $this->SelectedLinkStyle = $SelectedLinkStyle;
    }
    public function setLinkedStyle(string $linkedStyle)
    {
        $this->linkStyle = $linkedStyle;
    }
    public function setQuickButtonStyle(string $quickButtonStyle)
    {
        $this->quickButtonStyle = $quickButtonStyle;
    }



    //getters

    function getMaxPages()
    {
        return $this->maxPages;
    }
    public function getLinksNumber()
    {
        return $this->linksNumber;
    }
    public function getSelectedLinkStyle(string $SelectedLinkStyle)
    {
        return $this->SelectedLinkStyle;
    }
    public function getLinkedStyle(string $linkedStyle)
    {
        return $this->linkStyle;
    }
    public function getQuickButtonStyle(string $quickButtonStyle)
    {
        return $this->quickButtonStyle;
    }
    public function addQuickButtons()
    {
        $this->quickButtons[] = [];
    }

    public function show()
    {

        if (isset($_GET['p'])) {
            $p = $_GET['p'];
            $debut = (int) ($p - $this->getLinksNumber() / 2);
            $fin = (int) ($p + $this->getLinksNumber() / 2);
        } else {
            $debut = 1;
            $fin = 5;
            $p = 1;
        }

        if ($p < 3) {
            $debut = 1;
            $fin = $this->linksNumber + 1;
        }
        if ($p > ($this->getMaxPages() - 2)) {
            $debut = $this->getMaxPages() - $this->getLinksNumber();
            $fin = $this->getMaxPages();
        }

        if ($this->getMaxPages() < 5) {
            $debut = 1;
            $fin = $this->getMaxPages();
        }
        
        echo "<h1>Bonjour dans la page: " . $p . " </h1>";
        echo "<br>";
        $displayClas = "";
        if ($p == 1) {
            $displayClas = "hidden";
        }
        echo "<a class = {$displayClas} style=\" color :{$this->quickButtonStyle};\" href='index.php?p=1'> <img width=\"10px\" height=\"10px\" src=\" /../assets/arrow.png\" </a>";
        for ($i = $debut; $i <= $fin; $i++) {
            if ($i == $p) {
                # code...
                echo "<a class = \" lien\" style=\" color :{$this->SelectedLinkStyle};\" href='index.php?p=" . $i . "'> " . $i . " </a>";
                continue;
            }
            if ($i == 3) {
                echo "<a class=\"Selectedlien\" style=\" color :{$this->linkStyle};\" href='about.php?p=" . $i . "'> " . $i . " </a>";
            }
            echo "<a class=\"Selectedlien\" style=\" color :{$this->linkStyle};\" href='index.php?p=" . $i . "'> " . $i . " </a>";
        }

        echo "<a style=\" color :{$this->quickButtonStyle};\"  href='index.php?p=" . $this->getMaxPages() . "'>  <img width=\"10px\" height=\"10px\" src=\" /../assets/right-arrow.png\" </a>";
    }
}
