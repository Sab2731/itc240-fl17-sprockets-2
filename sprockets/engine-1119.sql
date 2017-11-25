/*

Engine_ID
Engine_Type
Engine_CC
Block_Head
Engine_Stroke
Oil_Capacity
Horsepower 
Torques
Output_hp_rpm
Description


*/



CREATE TABLE `mw-Engine` ( 
`Engine_ID` int(10) unsigned NOT NULL AUTO_INCREMENT, 
`Engine_Type` varchar(50) DEFAULT NULL, 
`Engine_CC` int(10) DEFAULT NULL, 
`Block_Head` varchar(50) DEFAULT NULL, 
`Engine_Stroke` int(10) DEFAULT NULL, 
`Oil_Capacity` int(10) DEFAULT NULL, 
`Horsepower` int(10) DEFAULT NULL, 
`Torques` int(10) DEFAULT NULL, 
`Output_hp_rpm` int(50) DEFAULT NULL,
`Description` varchar(80) DEFAULT NULL,
    PRIMARY KEY (`EngineID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into mw_Engine value(NULL,'petrol engine','2500','aluminium','4','3.5','280','312','7000','The induction stroke is the first stroke in a four-stroke internal combustion engine cycle. It involves the downward movement of the piston, creating a partial vacuum that draws a fuel/air mixture (or air alone, in the case of a direct injection engine) into the combustion chamber' );
insert into mw_Engine value(NULL,'petrol engine','1700','aluminium','4','4.1','321','354','4000', );
insert into mw_Engine value(NULL,'diesel engine','3.0','aluminium','6','3.5','180','252','5000', );






