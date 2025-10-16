use jamin_io_sd_2024a;

DROP PROCEDURE IF EXISTS sp_GetLeverantieInfo;

DELIMITER $$

CREATE PROCEDURE sp_GetLeverantieInfo(
    IN p_ProductId INT
)
BEGIN

    SELECT     PROD.Naam
              ,PPLE.DatumLevering
              ,PPLE.Aantal
              ,PPLE.DatumEerstVolgendeLevering
              ,MAGA.AantalAanwezig

    FROM       Product AS PROD

    INNER JOIN ProductPerLeverancier AS PPLE
    ON         PPLE.ProductId = PROD.Id

    INNER JOIN Magazijn AS MAGA 
    ON         MAGA.ProductId = PROD.Id

    WHERE      PROD.Id = p_ProductId;

END$$

DELIMITER ;