# Project 4
+ By: Christian Powell
+ Production URL: <http://p4.christianpowell.me>

## Database

Primary tables:
  + `events`
  + `categories`
  + `users`
  + `connect_events_and_users`
  
Pivot table(s):
  + `category_event`


## CRUD
__Create__
  + Visit the login in page and login in with the Jill/Jamal credentials to add a book <http://p4.christianpowell.me/events/create>
  + Fill out form to add event
  + Click *Add*
  + There will be an alert message on the redirect to the Events page
  
__Read__
  + Visit <http://p4.christianpowell.me/events> to see all events that users have added
    
__Update__
  + Visit the login in page and login in with the Jill/Jamal credentials to edit a book. On the "Your Events" page, you will see a listing of your books to make an edit to your event. You can only edit your events that you have added.
  + Make some edit to form
  + Click *Save changes*
  + There will be alert message displayed that your event was updated.
  
__Delete__
  + While you are logged in, visit the "Your events" page view your events. You will see the "delete" button in the same place that you edited your events. Again, you have to have created the event to delete it.
  + Confirm deletion
  + You will be redirected back to the events page with an alert that your event was removed.

## Outside resources
 * [PHP String Functions](http://php.net/manual/en/function.ucfirst.php) -- I used this source to help in two places. One I needed to know how to make the search feature work and be case insensitive. The other feature was the capitalize the first letter of my Categories. 
 
 * Class notes and instructor help

## Code style divergences
N/A

## Notes for instructor
I tried to get the "Events this Week" feature to work, but I couldn't seem to access the "when" feature. I will continue to research these Carbon methods and practice with them to make sure I understand this feature. Thanks for all of your help.