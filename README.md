summercamp
==========

## A summer camp registrations microsite

A responsive summer camp signup microsite built in PHP.

Uses AJAX to fetch the available dates for a camp from the DB dynamically.

The available dates are blocked out based on either number of signups (max 20) or close before a specific day.

Registrant info is posted both to database & also to an email API that will trigger an automatic confimation email to the registrant. The registrant data including name, signup date, and location is sent through the API for the emails to contain relevant information.

Session variables are used to store registrant information and create iCal files for the registrant to save in their calendar apps. Registration information is 

