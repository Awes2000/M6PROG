USE m6prog_db;

delete from imagetable where image_id=1;
DELETE FROM imagetable WHERE upload_date < DATE_SUB(NOW(), INTERVAL 30 DAY);

