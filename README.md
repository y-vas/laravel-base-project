run this commands befor starting

docker-compose up
composer update


if dump doesn't work
Tables ----------------------

CREATE TABLE Users (
  `customerId` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `docType` VARCHAR(45) NULL,
  `docNum` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `givenName` VARCHAR(45) NULL,
  `familyName1` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;

CREATE TABLE Products (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `productName` VARCHAR(45) NULL,
  `productTypeName` VARCHAR(45) NULL,
  `numeracioTerminal` INT NULL,
  `customerId` INT NULL,
  `soldAt` TIMESTAMP NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
