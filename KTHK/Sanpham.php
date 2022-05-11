<?php 
    class Sanpham {
        private $Masp;
        private $Tensp;
        private $Dongia;
        public function __construct($Masp, $Tensp, $Dongia) {
            $this -> Masp = $Masp;
            $this -> Tensp = $Tensp;
            $this -> Dongia = $Dongia;
        }
        public function __destruct() {
            $this->Masp = 0;
            $this->Tensp = "";
            $this->Dongia = "";
        }
        public function getMasp() { return $this->Masp; }
        public function getTensp() { return $this->Tensp; }
        public function getDongia() { return $this->Dongia; }
        public function Add() {
            $root = new DomDocument("1.0");
            $root -> load("./Sanpham.xml");
            $rootTag = $root->getElementsByTagName("qlsp")->item(0);
            $infoTag = $root->createElement("Sanpham");
            $MaspTag = $root->createElement("Masp", $this->Masp);
            $TenspTag = $root->createElement("Tensp", $this->Tensp);
            $DongiaTag = $root->createElement("Dongia", $this->Dongia);
            $infoTag->appendChild($MaspTag);
            $infoTag->appendChild($TenspTag);
            $infoTag->appendChild($DongiaTag);
            $rootTag->appendChild($infoTag);
            $root->formatOutput = true;
            $root->save("./Sanpham.xml");
        }
        // tao function Update
        public function Update() {
            $root = new DomDocument("1.0");
            $root -> load("./Sanpham.xml");
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qlkh/Sanpham[Masp='$this->Masp']");
            foreach ($kq as $node) {
                // tao node moi
                $infoTag = $root->createElement("Sanpham");
                $MaspTag = $root->createElement("Masp", $this->Masp);
                $TenspTag = $root->createElement("Tensp", $this->Tensp);
                $DongiaTag = $root->createElement("Dongia", $this->Dongia);
                $infoTag->appendChild($MaspTag);
                $infoTag->appendChild($TenspTag);
                $infoTag->appendChild($DongiaTag);
                // xoa node cu
                $node->parentNode->replaceChild($infoTag, $node);
            }
            $root->formatOutput = true;
            $root->save("./Sanpham.xml");
        }
        // tao function Delete
        public function Delete() {
            $root = new DomDocument("1.0");
            $root -> load("./Sanpham.xml");
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qlkh/Sanpham[Masp='$this->Masp']");
            foreach ($kq as $node) {
                $node->parentNode->removeChild($node);
            }
            $root->formatOutput = true;
            $root->save("./Sanpham.xml");
        }
    }
?>