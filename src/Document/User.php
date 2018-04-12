<?php

namespace App\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @MongoDB\Document(db="test", collection="users") 
 * 
 */
class User implements UserInterface
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $lastName;

    /**
     * @MongoDB\Field(type="string")
     * @Assert\NotBlank()
     */
    protected $password;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $dob;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $education;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $occupation;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $currentLocation;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $permLocation;

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getEmail() {
      return $this->email;
    }

    public function setEmail($email) {
      $this->email = $email;
    }

    public function getFirstName() {
      return $this->firstName;
    }

    public function setFirstName($firstName) {
      $this->firstName = $firstName;
    }

    public function getLastName() {
      return $this->lastName;
    }

    public function setLastName($lastName) {
      $this->lastName = $lastName;
    }
    
    public function getPassword() {
      return $this->password;
    }

    public function setPassword($password) {
      $this->password = $password;
    }

    public function getDob() {
      return $this->dob;
    }

    public function setDob($dob) {
      $this->dob = $dob;
    }

    public function getEducation() {
      return $this->education;
    }

    public function setEducation($education) {
      $this->education = $education;
    }

    public function getOccupation() {
      return $this->occupation;
    }

    public function setOccupation($occupation) {
      $this->occupation = $occupation;
    }

    public function getCurrentLocation() {
      return $this->currentLocation;
    }

    public function setCurrentLocation($currentLocation) {
      $this->currentLocation = $currentLocation;
    }

    public function getPermLocation() {
      return $this->permLocation;
    }

    public function setPermLocation($permLocation) {
      $this->permLocation = $permLocation;
    }

    public function getRoles() {
      
    }

    public function getSalt() {
      
    }

    public function getUsername() {
      return $this->email;      
    }

    public function eraseCredentials() {
      
    }

}
