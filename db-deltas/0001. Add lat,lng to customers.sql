ALTER TABLE `customers`
	ADD COLUMN `lat` DECIMAL(10,7) NOT NULL AFTER `last_logged`,
	ADD COLUMN `lng` DECIMAL(10,7) NOT NULL AFTER `lat`;