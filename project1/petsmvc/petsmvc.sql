 Select Pets data
SELECT Pets.PetsID, Pets.Age, Pets.Color, Pets.Neutered, Pets.BreedID, Pets.ToysID, Pets.PricingID,
       Breeds.BreedName,
       Toys.ToysName, Toys.BestFor,
       Pricing.ItemType, Pricing.Cost, Pricing.OnSale
FROM Pets
JOIN Breeds ON Pets.BreedID = Breeds.BreedID
JOIN Toys ON Pets.ToysID = Toys.ToysID
JOIN Pricing ON Pets.PricingID = Pricing.ItemID;

-- insert_data.sql

-- Insert data into Pets table
INSERT INTO Pets (PetsID, Age, Color, Neutered, BreedID, ToysID, PricingID)
VALUES
    (1, 2, 'Brown', 1, 1, 1, 1),
    (2, 3, 'Black', 0, 2, 2, 2);
