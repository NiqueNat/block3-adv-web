# block3-adv-prog
Advanced Web Programming
Sure, here's a brief summary of your project and its components:

# Project Summary

PET STORE A'MORE
live site
https://myrna67.web582.com/block3-adv-prog/project1/petStoreProj/petsstoremvc/ 

This project is a simple pet store application built with PHP. It follows the MVC (Model-View-Controller) design pattern and uses a MySQL database for data storage.

## Pages and Their Functions

1. **index.php:** This is the entry point of the application. It creates a new `PetController` object and calls the `display()` method on it. This method is responsible for handling form submissions and displaying the forms for adding a pet, a species, and a toy.

2. **PetController.php:** This file contains the `PetController` class, which handles the business logic of the application. It has methods for adding a pet, a species, and a toy, and a `display()` method for handling form submissions and displaying the forms.

3. **PetModel.php, SpeciesModel.php, BreedModel.php, ToyModel.php:** These files contain the model classes, which interact with the database. They have methods for inserting a new pet, species, breed, or toy into the database, and methods for fetching all pets, species, breeds, or toys.

4. **petForm.php:** This file contains the HTML forms for adding a pet, a species, and a toy. When these forms are submitted, they send a POST request to the server with the form data.

## Issues Encountered

1. **Forms not showing:** The forms for adding a pet, a species, and a toy were not showing up when the page was loaded. This was due to not calling the `petForm()` method when the page was loaded.--I have gotten the forms to display but that is about it. 

2. **Pet not being added to the database:** When the pet form was submitted, the pet was not being added to the `pets` table in the database. This was likely due to an issue with the `insertPet` method in the `PetModel` class.


![image](https://github.com/NiqueNat/block3-adv-web/assets/70446500/c44abf3b-447f-46df-a0e3-b611ce48344d)


![image](https://github.com/NiqueNat/block3-adv-web/assets/70446500/3a77d194-7ea9-4647-a6a5-222fe66440e6)

![image](https://github.com/NiqueNat/block3-adv-web/assets/70446500/e2b0356a-8e6a-4dbe-90b7-b0142c67c309)

![image](https://github.com/NiqueNat/block3-adv-web/assets/70446500/27f179b8-6ae7-4659-b4fb-1e77bc27a0b5)

![image](https://github.com/NiqueNat/block3-adv-web/assets/70446500/f203cace-588b-4e88-9db3-3e8a7697c922)

![image](https://github.com/NiqueNat/block3-adv-web/assets/70446500/5fd8f75c-1a51-4d5e-b59c-2097a5f7ba2d)



PET STORE A'AMORE
live site
https://myrna67.web582.com/block3-adv-prog/project1/petStoreProj/petsstoremvc/


