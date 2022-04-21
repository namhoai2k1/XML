<?php 
    class Khachhang {
        private $Makh;
        private $Tenkh;
        private $Diachi;
        public function __construct($Ma, $Ten, $Diachi) {
            $this->Makh = $Ma;
            $this->Tenkh = $Ten;
            $this->Diachi = $Diachi;
        }
        public function __destruct() {
            $this->Makh = 0;
            $this->Tenkh = "";
            $this->Diachi = "";
        }
        public function getMakh() { return $this->Makh; }
        public function getTenkh() { return $this->Tenkh; }
        public function getDiachi() { return $this->Diachi; }
        public function Add() {
            $root = new DomDocument("1.0");
            $root -> load("./Khachang.xml");
            $rootTag = $root->getElementsByTagName("qlkh")->item(0);
            $infoTag = $root->createElement("Khachang");
            $MakhTag = $root->createElement("Makh", $this->Makh);
            $TenkhTag = $root->createElement("Tenkh", $this->Tenkh);
            $DiachiTag = $root->createElement("Diachi", $this->Diachi);
            $infoTag->appendChild($MakhTag);
            $infoTag->appendChild($TenkhTag);
            $infoTag->appendChild($DiachiTag);
            $rootTag->appendChild($infoTag);
            $root->formatOutput = true;
            $root->save("./Khachang.xml");
        }
        // tao function Update
        public function Update() {
            $root = new DomDocument("1.0");
            $root -> load("./Khachang.xml");
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qlkh/Khachang[Makh='$this->Makh']");
            foreach ($kq as $node) {
                // tao node moi
                $infoTag = $root->createElement("Khachang");
                $MakhTag = $root->createElement("Makh", $this->Makh);
                $TenkhTag = $root->createElement("Tenkh", $this->Tenkh);
                $DiachiTag = $root->createElement("Diachi", $this->Diachi);
                $infoTag->appendChild($MakhTag);
                $infoTag->appendChild($TenkhTag);
                $infoTag->appendChild($DiachiTag);
                $node->parentNode->replaceChild($infoTag, $node);
            }
            $root->formatOutput = true;
            $root->save("./Khachang.xml");
        }
        // tao function Delete
        public function Delete() {
            $root = new DomDocument("1.0");
            $root -> load("./Khachang.xml");
            $xpath = new DOMXPath($root);
            $kq = $xpath->query("/qlkh/Khachang[Makh='$this->Makh']");
            foreach ($kq as $node) {
                $node->parentNode->removeChild($node);
            }
            $root->formatOutput = true;
            $root->save("./Khachang.xml");
        }
    }
?>