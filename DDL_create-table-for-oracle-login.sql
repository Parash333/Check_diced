CREATE TABLE  "TRADER_LOGIN" 
   (	"TRADER_ID" NUMBER(10,0), 
	"USERNAME" VARCHAR2(250), 
	"PASSWORD" VARCHAR2(300), 
	"STATUS" NUMBER
   )
/
ALTER TABLE  "TRADER_LOGIN" ADD FOREIGN KEY ("TRADER_ID")
	  REFERENCES  "TRADER" ("TRADER_ID") ON DELETE CASCADE ENABLE
/