/*
	*********************************
	* Author: Thiago Henrique Felix *
	* Date: 23/10/2017		        *
	* Time: 18:29			        *
	* Version: 0.1			        *
	*********************************
*/


/*Tabela do candidato*/

CREATE TABLE CANDIDATO(

ID INTEGER,
PRIMEIRO_NOME VARCHAR(25) NOT NULL,
SOBRENOME VARCHAR(30) NOT NULL,
STATUS VARCHAR(25) NOT NULL,
CPF VARCHAR(14),
INFO_TRABALHOS VARCHAR(255) NOT NULL,
INFO_QUALIDADES VARCHAR(255) NOT NULL,
INFO_EMPREGO VARCHAR(255) NOT NULL,
TELEFONE VARCHAR(20) NOT NULL,
EMAIL VARCHAR(50) NOT NULL,

CONSTRAINT PK_Candidato PRIMARY KEY (ID),
CONSTRAINT CK_Status_CAN CHECK(UPPER(STATUS) in ('ESPERA','APROVADO','REPROVADO') )

);

/*Tabela do ADMINISTRADOR*/

CREATE TABLE ADMINISTRADOR(

ID INTEGER,
PRIMEIRO_NOME VARCHAR(25) NOT NULL,
SOBRENOME VARCHAR(30) NOT NULL,
STATUS VARCHAR(25) NOT NULL,
USERNAME VARCHAR(25) NOT NULL,
SENHA VARCHAR(35) NOT NULL,
TELEFONE VARCHAR(20) NOT NULL,
EMAIL VARCHAR(50) NOT NULL,

CONSTRAINT PK_Administrador PRIMARY KEY (ID),
CONSTRAINT CK_Status_ADM CHECK (UPPER(STATUS) in ('ATIVO','INATIVO') )


);

/************************************************************************************************/

/* TABELAS DE AUDITORIA */


/*TABELA DE AUDITORIA_ADMINISTRADOR*/

CREATE TABLE AUDIT_ADM(


ID INTEGER,
DATA DATE NOT NULL,
HORA TIME NOT NULL,
USER_BANCO VARCHAR(50) NOT NULL,
OPERATION VARCHAR(10) NOT NULL,

ID_ADM INTEGER,
PRIMEIRO_NOME VARCHAR(25) NOT NULL,
SOBRENOME VARCHAR(30) NOT NULL,
STATUS VARCHAR(25) NOT NULL,
USERNAME VARCHAR(25) NOT NULL,
SENHA VARCHAR(35) NOT NULL,
TELEFONE VARCHAR(20) NOT NULL,
EMAIL VARCHAR(50) NOT NULL,

CONSTRAINT PK_Audit_AUDADM PRIMARY KEY (ID),
CONSTRAINT CK_Status_AUDADM CHECK (UPPER(STATUS) in ('ATIVO','INATIVO') )


);

/*TABELA DE AUDITORIA_CANDIDATO*/

CREATE TABLE AUDIT_CAN(

ID INTEGER,
DATA DATE NOT NULL,
HORA TIME NOT NULL,
USER_BANCO VARCHAR(50) NOT NULL,
OPERATION VARCHAR(10) NOT NULL,

ID_CAN INTEGER,
PRIMEIRO_NOME VARCHAR(25) NOT NULL,
SOBRENOME VARCHAR(30) NOT NULL,
STATUS VARCHAR(25) NOT NULL,
CPF VARCHAR(14),
INFO_TRABALHOS VARCHAR(255) NOT NULL,
INFO_QUALIDADES VARCHAR(255) NOT NULL,
INFO_EMPREGO VARCHAR(255) NOT NULL,
TELEFONE VARCHAR(20) NOT NULL,
EMAIL VARCHAR(50) NOT NULL,

CONSTRAINT PK_Audit_AUDCAN PRIMARY KEY (ID),
CONSTRAINT CK_Status_AUDCAN CHECK (UPPER(STATUS) in ('ESPERA','APROVADO','REPROVADO') )


);


/************************************************************************************************/
/*GENERATOR*/
CREATE GENERATOR GN_ADMINISTRADOR;
CREATE GENERATOR GN_CANDIDATO;
CREATE GENERATOR GN_CANDIDATO_AUDIT;
CREATE GENERATOR GN_ADMINISTRADOR_AUDIT;
/************************************************************************************************/



/*=================================>>>> TRIGGERS <<<<===========================================*/


/*======================================================================*/
/* CANDIDATO */


SET TERM^;

CREATE TRIGGER TR_CANDIDATO FOR CANDIDATO
ACTIVE
BEFORE INSERT OR UPDATE OR DELETE
AS
BEGIN

    IF(INSERTING) THEN BEGIN

        IF(NEW.ID IS NULL) THEN BEGIN
            NEW.ID = GEN_ID(GN_CANDIDATO,1);
        END
            
         INSERT INTO AUDIT_CAN VALUES(
        
        
                GEN_ID(GN_CANDIDATO_AUDIT,1),
                CURRENT_DATE,
                CURRENT_TIME,
                CURRENT_USER,
                'INSERT',
                
                NEW.ID,
                NEW.PRIMEIRO_NOME,
                NEW.SOBRENOME,
                NEW.STATUS,
                NEW.CPF,
                NEW.INFO_TRABALHOS,
                NEW.INFO_QUALIDADES,
                NEW.INFO_EMPREGO,
                NEW.TELEFONE,
                NEW.EMAIL
        
    );
    

    END

    IF(DELETING) THEN BEGIN

         INSERT INTO AUDIT_CAN VALUES(
        
        
                GEN_ID(GN_CANDIDATO_AUDIT,1),
                CURRENT_DATE,
                CURRENT_TIME,
                CURRENT_USER,
                'DELETE',
                
                OLD.ID,
                OLD.PRIMEIRO_NOME,
                OLD.SOBRENOME,
                OLD.STATUS,
                OLD.CPF,
                OLD.INFO_TRABALHOS,
                OLD.INFO_QUALIDADES,
                OLD.INFO_EMPREGO,
                OLD.TELEFONE,
                OLD.EMAIL
        
    );
    

    END

    IF(UPDATING) THEN BEGIN
    
   INSERT INTO AUDIT_CAN VALUES(
        
        
                GEN_ID(GN_CANDIDATO_AUDIT,1),
                CURRENT_DATE,
                CURRENT_TIME,
                CURRENT_USER,
                'UPDATE',
                
                OLD.ID,
                OLD.PRIMEIRO_NOME,
                OLD.SOBRENOME,
                OLD.STATUS,
                OLD.CPF,
                OLD.INFO_TRABALHOS,
                OLD.INFO_QUALIDADES,
                OLD.INFO_EMPREGO,
                OLD.TELEFONE,
                OLD.EMAIL
        
    );

    END

END^

SET TERM;^

/*======================================================================*/
/* ADMINISTRADOR */


SET TERM^;

CREATE TRIGGER TR_ADMINISTRADOR FOR ADMINISTRADOR
ACTIVE
BEFORE INSERT OR UPDATE OR DELETE
AS
BEGIN

    IF(INSERTING) THEN BEGIN

        IF(NEW.ID IS NULL) THEN BEGIN
            NEW.ID = GEN_ID(GN_ADMINISTRADOR,1);
        END
            
      INSERT INTO AUDIT_ADM VALUES(
        
        
                GEN_ID(GN_ADMINISTRADOR_AUDIT,1),
                CURRENT_DATE,
                CURRENT_TIME,
                CURRENT_USER,
                'INSERT',
                
                NEW.ID,
                NEW.PRIMEIRO_NOME,
                NEW.SOBRENOME,
                NEW.STATUS,
                NEW.USERNAME,
                NEW.SENHA,
                NEW.TELEFONE,
                NEW.EMAIL
        
    );
    

    END

    IF(DELETING) THEN BEGIN

        INSERT INTO AUDIT_ADM VALUES(
        
        
                GEN_ID(GN_ADMINISTRADOR_AUDIT,1),
                CURRENT_DATE,
                CURRENT_TIME,
                CURRENT_USER,
                'DELETE',
                
                OLD.ID,
                OLD.PRIMEIRO_NOME,
                OLD.SOBRENOME,
                OLD.STATUS,
                OLD.USERNAME,
                OLD.SENHA,
                OLD.TELEFONE,
                OLD.EMAIL
        
    );

    END

    IF(UPDATING) THEN BEGIN
    
  INSERT INTO AUDIT_ADM VALUES(
        
        
                GEN_ID(GN_ADMINISTRADOR_AUDIT,1),
                CURRENT_DATE,
                CURRENT_TIME,
                CURRENT_USER,
                'UPDATE',
                
                OLD.ID,
                OLD.PRIMEIRO_NOME,
                OLD.SOBRENOME,
                OLD.STATUS,
                OLD.USERNAME,
                OLD.SENHA,
                OLD.TELEFONE,
                OLD.EMAIL
        
    );
    END

END^

SET TERM;^

