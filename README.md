# Super Simple Form
This is a super simple form, built on top of Laravel and Livewire.

## Running the form locally
The application requires the following to run locally:
- PHP 8.2
- Node 18x
- Docker

In the root of this application
run the following commands to get a working instance.
- Install composer packages `composer install`
- Create the application sever `./vendor/bin sail up -d`

The application will now be available at http://localhost

The form can be reached at http://localhost/form/me

## The Task
Create a Form:
- Create a new Laravel and Livewire application (you can use the latest version)
- Create a 2 page form (livewire form so both pages are on the same URL route). First page should have Next button, the second page should have Previous and Submit buttons. (Previous goes to page 1, where it should keep all of the form input user entered, the submit button submits the form, etc...)
- Page 1 fields:
- First name
- Last name
- Address
- City
- Country
- Date of birth (3 separate select fields month/day/year) - on the backend combine these so it's easy to save as date time field in MySQL.
- Page 2 fields:
- "Are you married?" - Yes/No
- If Yes, the following fields show up conditionally:
- Date of marriage - same logic as Date of birth (If date of marriage occurred before the user was 18 years old, show an error message "You are not eligible to apply because your marriage occurred before your 18th birthday." and do not allow submission of form.)
- Country of marriage
- If No, the following fields show up conditionally:
- Are you widowed? Yes/No
- Have you ever been married in the past? Yes/No
  Submit - Form submission should show a white page with output of the form results.

## Log
Started: 7:30 AM EST
- Created GitHub Repo
- Installed Laravel & Livewire
- Read task & plan application on whiteboard
- Create form page 1 functionality
- Create form page 2 functionality
- Create result page functionality
- Testing
- Documentation / Comments
- Code Cleanup
- Styling updates
