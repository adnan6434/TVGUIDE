//to get all the rights of the user

SELECT DISTINCT(Rights) from role,rights,roledefination,user
 WHERE role.RoleID=user.RoleID 
 and role.RoleID=roledefination.RoleID 
 and roledefination.RightID=rights.RightID 


//calculate Rating 
SELECT((SELECT sum(Rating)from review where ProgrammeID=3)/(select count(ReviewID) from review where ProgrammeID=3)) as Rating

select ChannelName from channel where channel.ChannelID=(select ChannelID from channelbookmark,user where user.ID=ChannelBookmark.UserID);

select FirstName+" "+LastName as"Name" from user,review where review.UserID=user.ID GROUP BY Name ORDER BY Name


select * from Programme where TimeSlotID=(select TimeslotID from timeslot where SlotDuration='one hour')

select user.UserID,UserName,channelbookmark.ChannelBookMarkID,ChannelName 
from user,channel,channelbookmark 
where 
user.UserId=channelbookmark.UserID
and 
channelbookmark.ChannelID= channel.ChannelID
