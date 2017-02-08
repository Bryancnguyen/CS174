# CS174
The greatest code of all time

Git Commands:

git clone https://github.com/Bryancnguyen/CS174.git

**Now Checkout a Branch**
git checkout -b <Name of your branch>

**Make sure you're on the branch**
git status

**Do some stuff to the CS174 folder, add, remove, etc**

git status

**Check if whatever you did happened**

git add <files that you messed with>

**Place files into Staging**

git commit -m "<Write a present tense message about whatever you did>"

**Commit on the file in order to push**

git status

** Now no files should be red **

git push origin <Your Branch Name>

** Go to github and check for the notification that a new Pull Request can be done **

Click Create Pull Request

**Do not merge, Let someone else look at it then merge it**


Now for updating your local repository so that it matches the Github repo.. Say there's new files on Github and you don't
have it in your local folder. You must update your local repo so that it matches the master branch in order to do any new pushes.
Easy way to do this is:

1. Switch your branch to master when you are about to work on something new.
git checkout master
git status <--- Check that you are on master.

2. git pull origin
if you get an error do:
git pull https://github.com/Bryancnguyen/CS174.git

3. You should see the files get added to your local repo.

4. Now you can create a new branch off of that using
git checkout -b <branch name>

5. Warning if you do not do this, we will have a bad branch and we will have to rebase because Github will tell you
that your merge does not match the master branch and it will create conflicts.
In other words, you will have a very very bad day.

Congrats, now you are a Github master.


