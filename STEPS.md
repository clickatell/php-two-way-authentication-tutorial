TUTORIAL STEPS
--------------

1. Create a composer ready project

    
    $ mkdir two-way-authentication-tutorial
    $ cd two-way-authentication-tutorial
    $ composer init
    
    
2. Install the Clickatell PHP lib

    $ composer require arcturial/clickatell
    
3. Create folders for our files, lets get organized

    $ # our php classes
    $ mkdir src
    
    $ # our html and asset files
    $ mkdir public
    
4. Create new Authentication Class, keeping it simple for tutorial. This should go in our src folder.

4.1 Create simple method stub (you'll do more in here for you actual project) called Authenticate that 
takes a username and password and return a mobile number if successful otherwise false.
 
    
  