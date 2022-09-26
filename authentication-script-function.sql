function AUTHENTICATE_USER(p_username varchar2, p_password varchar2) 
return boolean as  
v_stat number (1);
     Begin 
     Select 1 into v_stat
     from TRADER
     where upper(TRADER_EMAIL)=upper(p_username) and PASSWORD = p_password and TRADER_STAT = 1; 
     return true; 
     exception 
      When No_Data_Found Then 
      return false;
   end AUTHENTICATE_USER;