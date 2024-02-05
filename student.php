<?php
class Student{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $gender;
    private $birthday;
    private string $address;
    private string $city;
    private string $country;
    private string $phone;

    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        string $gender,
        $birthday,
        string $address,
        string $city,
        string $country,
        string $phone
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->city = $city;
        $this->country = $country;
        $this->phone = $phone;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function setGender(string $gender): void {
        $this->gender = $gender;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function setBirthday($birthday): void {
        $this->birthday = $birthday;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function setCity(string $city): void {
        $this->city = $city;
    }

    public function getCountry(): string {
        return $this->country;
    }

    public function setCountry(string $country): void {
        $this->country = $country;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    public function __toString(): string {
        return "ID: {$this->id}, FirstName: {$this->firstName}, LastName: {$this->lastName},
         Gender: {$this->gender}, Birthday: {$this->birthday}, Address: {$this->address},
          City: {$this->city}, Country: {$this->country}, Phone: {$this->phone}";
    }

}

