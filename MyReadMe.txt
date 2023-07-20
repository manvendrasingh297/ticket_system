Steps to follow:

Add env file and create a DB and add it in file.

php artisan serve
composer update
php artisan migrate
php artisan migrate db:seed
-----------
Admin Users Login:

admin@gmail.com
admin@123

employee1@gmail.com
12345678

employee2@gmail.com
12345678
---
Frontend Users Login (You can register with frontend):

user1@gmail.com
12345678
-------------------

About Project description:

1. Register a user from frontend.
2. Create a ticket. it will go to admin then admin will assign user (Admin Users/employee created in admin).
3. Admin has roles and permissions module where Assigned users can access your own tickets when login n adminside.
4. Assigned user can view or edit ticket, while edit user can add comment on ticket. And update ticket status. And frontend user can view and list your ticket after login to frontend.
-----

Note: Af per my knowledge and experience, I create ticket system for one to one assignation and comment on each ticket. Its depends what is the axact requirement by client.
If you want to create ticket support system then you need to manage coments on tickets seperately with comments as like chat application.

Notification is still remain due to time issue.
