<?php
namespace App\Classes ;

use App\Models\JobofferModel;

class Joboffer {
    private $id;
    private $companyName;
    private $position;
    private $description ;
    private $salary;
    private $location; 
    private $archiveJob;
    private $photo;

    
     // Getters
     public function getId() {
        return $this->id;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function getLocation() {
        return $this->location;
    }

    public function isArchived() {
        return $this->archiveJob;
    }

    public function getPhoto() {
        return $this->photo;
    }



    // Setters
    public function setCompanyName($companyName) {
        $patter = "/^[a-zA-Z0-9_]{3,20}$/";
        $this->companyName = $companyName;
    }

    public function setPosition($position) {
        $patter = "/^[a-zA-Z0-9_]{3,20}$/";
        $this->position = $position;
    }

    public function setDescription($description) {
        $patter = "/^[a-zA-Z0-9_]{3,150}$/";

        $this->description = $description;
    }

    public function setSalary($salary) {
        $_patter = "/^\d+$/";
        $this->salary = $salary;
    }

    public function setLocation($location) {
         $patter = "/^[a-zA-Z0-9_]{3,50}$/";

        $this->location = $location;
    }

    public function setArchived($archiveJob) {
        $this->archiveJob = $archiveJob;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    // Mark the job as archived
    public function archive() {
        $this->archiveJob = true;
    }

    // Reactivate the job
    public function reactivate() {
        $this->archiveJob = false;
    }



    public function AddJobOffer($company,$position,$description,$salary,$location,$categorie,$tag,$filePath,$userId){
        $insertPost = new JobofferModel();
        $insertPost->insertPost($company,$position,$description,$salary,$location,$categorie,$tag,$filePath,$userId);
    }

    public function displayoffers(){
        $fetch = new JobofferModel();
        return $fetch->fetchoffers();
    }



}

?>