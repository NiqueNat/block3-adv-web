<?php
include_once '../model/BaseModel.php';

class Pet extends BaseModel {
    protected $name;
    protected $breedId;
    protected $speciesId;
    protected $age;
    protected $color;
    protected $isMammal;

    public function __construct($id, $name, $breedId, $speciesId, $age, $color, $isMammal, $pdo) {
        $this->name = $name;
        $this->breedId = $breedId;
        $this->speciesId = $speciesId;
        $this->age = $age;
        $this->color = $color;
        $this->isMammal = $isMammal;
        parent::__construct($id, $pdo);
    }

    public function save() {
        $stmt = $this->pdo->prepare("INSERT INTO Pets (PetID, name, breedId, speciesId, age, color, isMammal) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE name = VALUES(name), breedId = VALUES(breedId), speciesId = VALUES(speciesId), age = VALUES(age), color = VALUES(color), isMammal = VALUES(isMammal)");
        $stmt->execute([$this->id, $this->name, $this->breedId, $this->speciesId, $this->age, $this->color, $this->isMammal]);
    }

    public static function find($id, $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM Pets WHERE PetID = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if ($data) {
            return new Pet($data['PetID'], $data['name'] ?? '', $data['breedId'] ?? '', $data['speciesId'] ?? '', $data['age'] ?? '', $data['color'] ?? '', $data['isMammal'] ?? '', $pdo);
        }

        return null;
    }

    public function delete() {
        $stmt = $this->pdo->prepare("DELETE FROM Pets WHERE PetID = ?");
        $stmt->execute([$this->id]);
    }
}
?>
