use jamin_io_sd_2024a;

DROP PROCEDURE IF EXISTS sp_GetLeverancierInfo;

DELIMITER $$

CREATE PROCEDURE sp_GetLeverancierInfo(
    IN p_ProductId INT
)
BEGIN

	SELECT DISTINCT LEVE.Naam
				   ,LEVE.Contactpersoon
				   ,LEVE.Leveranciernummer
				   ,LEVE.Mobiel
	FROM 		   Leverancier AS LEVE

	INNER JOIN 	   ProductPerLeverancier AS PPLE 
	ON     		   LEVE.Id = PPLE.LeverancierId

	WHERE      	   PPLE.ProductId = p_ProductId;



END$$

DELIMITER ;