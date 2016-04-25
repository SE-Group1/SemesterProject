# HookedUp

HookedUp is a semester project for a software engineering class at Mizzou. Essentially, HookedUp is a functional clone of LinkedIn, a social media network for professionals with the goal to create lasting connections between the users and ultimately provide job opportunities for professionals.

Website: http://segroup1.cloudapp.net/

Look to our [wiki](https://github.com/SE-Group1/HookedUp/wiki) for more information about project development.

## Contributing

If you want to fork, check out, or contribute to the project, we have some instructions for forking and installation of the project on your machine or server. We have general instructors for everything necessary to run the project, and also specific instructions for Mac OSX users because our current contributors all work on OSX.

### Forking

To work on your own version of the project, maintain and older version, or contribute, you will want to begin by forking.

1) To begin, click on the "Fork" button on the top-right of the web page and select a location for the repository.

    * When Github has finished forking the project, you should be redirected to a page similar to the one you started on, but you will notice the repository is now in the location you selected instad of SE-Group1.

2) From there, if you want to make a pull request in order to contribute to the main project, you can do so my pressing "New pull request" on the main repository page and creating a pull request from your fork to the main repository.

### Dependencies

After you have cloned the repository, you will want to set up your environment with the correct dependencies in order to run the project. In the sections ahead, we will walk through this process for both Azure servers and local OSX environments. If neither of these cases work for you, here are the dependencies that you will need installed in order to run the project:

* Apache 2.4 (not required for local dev, as we will show later)
* PHP 5.5
* MySQL 5.5
* php5-curl, php5-mysql, & php5-mysqlnd

### Server Installation

HookedUp uses an Azure Virtual Machine to host its website -- you might want to do the same. To create a virtual machine in Azure, you must choose to use either the classic model od deployment or the resource manager model. The classic model will create a VM that is sort of in its own bubble and uses its own resource group and other services that Azure provides to run the server. The resource manager model will have you create or use an existing resource group. This resource group can be used by many virtual machines instead of having a one-to-one relationship. In our case, we chose to use the classic model with an "Ubuntu Server 14.04 LTS" (all linux commands ahread will be oriented for Ubuntu 14.04 LTS machines). Once you have selected your server type and deployment model, Azure will walk you through the rest and deploy your VM when you are done.

Once your server has been deployed, you can ssh into using the credentials you set up:
```ssh username@servername.cloudapp.net```

Once you have successfully logged in to the server, you will need to do some work to set it up to run the project. These commands will install all the dependencies we listed earlier and get you set up.

Update packages:
```sudo apt-get update```

Install LAMP stack (Don't miss the carrot (^)!):
```sudo apt-get install lamp-server^```

Will this runs, you will probably get a popup asking you to provide a password for the root user. You can provide any password as long as you change it in the api, but for now we are using 'hookedup', so you might want to stick with this too (we will obviously not be using this for the production environment).

After everything has finished install, you will want to upgrade and update your packages:
```sudo apt-get upgrade```
```sudo apt-get update```

Now, if you are using Azure, you will want to go back to the portal to do one last thing. The HTTP port on your VM is closed by default, so we need to add an endpoint for it. Click on your VM to open up the settings page, click on "Endpoints" under the "General" header and add a new endpoint called "HTTP" with the TCP protocol and with private and public port 80. This will allow people to connect to your website via the same address you ssh'd with.

Back in terminal, run this command:
```sudo service apache2 restart```

This will restart apache and allow you to connect to your website through a browser. Try it now to make sure it works!

### Cloning the Project

Now that basics of the server are set up, we will want to clone the project. First, we will need to install git:
```sudo apt-get install git```

Then, clone the project (you will use your fork here instead of the main project). This will download the project into a git repository on your local machine. In our case, we wanted to keep our project in the root of the server so we did this:
```cd /```
```sudo git clone https://github.com/SE-Group1/HookedUp.git```

### Apache 2 Setup

At this point, Apache is pointing to the /var/www/ folder on your machine, but we want it to point to /HookedUp/HookedUp/ instead (the top level folder contains non-website stuff). To change this behavior, we will need to edit some Apache config files.
```cd /etc/apache2/```
```ls```

If you see a folder called "sites-enabled" cd into that. There should be a configuration file in there like '000-default'.
If you do not see "sites-enabled", you will want to troubleshoot how to change the Apache root location.

You will want to replace any lines referencing "/var/www/" with "/HookedUp/HookedUp" or wherever your project is. In particular there is a line referring to the "DocumentRoot", which is where Apache points requests. You can edit the file using vim:
```sudo vim 000-default```
Use 'i' to start insertion mode in vim and ':wq' to save and quit.

After this, you will want to cd backwards one folder into /etc/apache2/, where you will edit the apache2.conf file. You will also want to replace "/var/www/" references with "/HookedUp/HookedUp" here. This will give requesters permission to see the files you want to show.

Try running ```sudo service apache2 restart``` again to restart Apache. You should see the website's login page. If you do, congratulations! You're almost there. If this doesn't work for you, you should troubleshoot online. There are many different answers to this problem that we have seen.

### MySQL Setup

We have our website wet up, but we need to get the database going because it's empty right now! To start mysql in terminal, you'll want to execute this command:
```mysql -u root -p```
`-u` referes the username ("root"), and `-p` means we are going to provide a password. When it prompts you, enter the password you provided during setup.

In MySQL, enter:
```CREATE DATABASE hookedup;```

Now, exit using `exit;`

We are going to import seed data for the project, so you will want to cd to your project folder.
```cd /Hookedup```

Now, run this command to import the seed data into the hookedup database:
```mysql -u root -p hookedup < seed-data.sql```

You're almost done! We just need to install a few more packages now.
```sudo apt-get install php5-curl```
```sudo apt-get install php5-mysqlnd```
```sudo apt-get install php5-mysqli```

That should be it! If you encounter any problems you can look in the apache error log using vim to see what needs to be fixed.
```sudo vim /var/log/apache2/error.log```