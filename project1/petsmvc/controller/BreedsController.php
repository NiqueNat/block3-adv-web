<?php
require_once 'Breeds.php';

class BreedsController {
    public function getBreed($id) {
        $breed = Breeds::find($id);
        // Handle the case where no breed was found
        if ($breed === null) {
            // Return an error or redirect the user
        } else {
            // Return the breed or display it in a view
        }
    }

    public function createBreed($breedName, $speciesId, $pureBred, $mixedBreed) {
        $breed = new Breeds();
        $breed->breedName = $breedName;
        $breed->speciesId = $speciesId;
        $breed->pureBred = $pureBred;
        $breed->mixedBreed = $mixedBreed;
        $breed->save();
    }

    public function updateBreed($id, $breedName, $speciesId, $pureBred, $mixedBreed) {
        $breed = Breeds::find($id);
        // Handle the case where no breed was found
        if ($breed === null) {
            // Return an error or redirect the user
        } else {
            $breed->breedName = $breedName;
            $breed->speciesId = $speciesId;
            $breed->pureBred = $pureBred;
            $breed->mixedBreed = $mixedBreed;
            $breed->save();
        }
    }

    public function deleteBreed($id) {
        $breed = Breeds::find($id);
        // Handle the case where no breed was found
        if ($breed === null) {
            // Return an error or redirect the user
        } else {
            $breed->delete();
        }
    }
}
?>