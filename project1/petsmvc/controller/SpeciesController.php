<?php
require_once 'Species.php';

class SpeciesController {
    public function getSpecies($id) {
        $species = Species::find($id);
        // Handle the case where no species was found
        if ($species === null) {
            // Return an error or redirect the user
        } else {
            // Return the species or display it in a view
        }
    }

    public function createSpecies($speciesName) {
        $species = new Species();
        $species->speciesName = $speciesName;
        $species->save();
    }

    public function updateSpecies($id, $speciesName) {
        $species = Species::find($id);
        // Handle the case where no species was found
        if ($species === null) {
            // Redirect the user to an error page
            header('Location: /error');
        } else {
            $species->speciesName = $speciesName;
            $species->save();
            // Redirect the user to the updated species page
            header('Location: /species/' . $id);
        }
    }

    public function deleteSpecies($id) {
        $species = Species::find($id);
        // Handle the case where no species was found
        if ($species === null) {
            // Redirect the user to an error page
            header('Location: /error');
        } else {
            $species->delete();
            // Redirect the user to the species list page
            header('Location: /species');
        }
    }
}  
?>