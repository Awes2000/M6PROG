USE m6prog_db

update 'imagetable' set upload_date = DATE_ADD(CURRENT_DATE, INTERVAL -31 DAY);