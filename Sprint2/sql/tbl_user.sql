CREATE TABLE TBL_USER(
	ID_USER SMALLINT NOT NULL AUTO_INCREMENT,
  	USER_NOME VARCHAR(100) NOT NULL,
    USER_SENHA VARCHAR(20) NOT NULL,
    USER_EMAIL VARCHAR(50),
    USER_MODERADOR CHAR(1) DEFAULT 'N',
    
    CONSTRAINT PK_USER PRIMARY KEY (ID_USER)
    
    
);