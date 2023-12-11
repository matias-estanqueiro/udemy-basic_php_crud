# Newsletter App

The Newsletter App is a simple web application for managing subscribers in a database. It allows users to register new contacts, view the list of existing contacts, as well as delete and update records. The user interface is designed cleanly and accessibly, making interaction with the application straightforward.

## Authors

-   [@MatiasEstanqueiro](https://www.github.com/matias-estanqueiro)

## Features:

Subscriber Registration:

-   Access the registration form provided on the main page.
-   Enter subscriber information (first name, last name, email), and click "Submit" to add it to the database.
    Viewing Subscribers:
-   In the "Users Container" section, a list of existing subscribers will be displayed with details such as ID, name, last name, and email.
    Deleting and Updating Records:
-   Each subscriber in the list has links to delete and update their records.
-   "Delete" permanently removes the subscriber's record.
-   "Update" redirects to an update page where changes to the subscriber's information can be made.

## Documentation

#### Confirmation Messages:

-   After performing operations such as deleting, updating, or inserting records, the application provides confirmation messages to inform the user of the outcome.

#### Style Customization:

-   The application uses inline styles within HTML tags for a simple presentation. You can customize these styles according to your preferences by modifying the CSS properties within the tags.

## Installation

#### Pre-requisites:

-   Web server (e.g., Apache)
-   MySQL database server
-   PHP installed on the server

#### Server Configuration:

Database:

-   Create a database named "newsletter" on your MySQL server.
-   Configure the server credentials in the PHP file (see "PHP File Configuration" section).
    PHP File Configuration:
-   Open the main PHP file (index.php) in a text editor.
-   Modify the variables $servername, $username, $password, and $dbname to match your database setup.

## Important Note!

-   This application is a basic example and does not implement advanced security measures. It is recommended to perform validations and filter data before conducting operations on a database in a production environment.
