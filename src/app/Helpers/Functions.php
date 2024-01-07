<?php
use App\Models\Groups;
use App\Models\Muon;
use App\Models\Maloai;
function getAllGroups(){
    $groups = new Groups;
    return $groups->getAll(); 
}

function getAllMaloai(){
    $maloai = new maloai;
    return $maloai->allMaloai();
 }

 