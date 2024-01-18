USE m6prog_db;

DELETE FROM `imagetable` WHERE upload_date < DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY);
