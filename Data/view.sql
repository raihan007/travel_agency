CREATE OR REPLACE VIEW booking_info_view
AS
Select packages_booking_info.EntityNo,packages_booking_info.ClientId,
CONCAT(users_info.FirstName,' ',users_info.LastName) AS 'Fullname',
packages_booking_info.PackageId,packages_info.Title,packages_booking_info.Quantity,
packages_info.Cost,packages_info.Discount,packages_booking_info.TotalCost,
packages_booking_info.Date FROM packages_booking_info
inner join users_info on users_info.UserId = packages_booking_info.ClientId
inner join packages_info on packages_info.ID = packages_booking_info.PackageId
WHERE NOT packages_info.IsDeleted=1;