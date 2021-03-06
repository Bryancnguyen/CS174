# CS174 HW2
##BRYAN NGUYEN, RICHARD PAPALIA, JACK WANKE

- [x] Your Hw2.zip folder should have a readme.txt file with all the names and ids for your group.
- [x] All pages produced by your app should be valid XHTML 5.
- [x] Your app should work regardless of what folder under DOCUMENT_ROOT the grader chooses to grade it. If you have variables/constants that need to be set to ensure this, they should be in a file config.php which is require_once'd by your index.php file.
- [x] All urls used by your app (for links, form data, etc) should be of one of the following forms:
- [x] (1) index.php
- [x] (2) index.php?a=some_activity&arg1=some_argument1
- [x] (3) index.php?a=some_activity&arg1=some_argument1&arg2=some_argument2
- [x] Here allowed activities are: landing, edit, read, confirm. An example possible use of the arg1 variable might be to hold a file title.
- [x] Your index.php should have four functions: landingView, editView, readView, confirmView. These are supposed to draw the Landing Page, The Edit Page, the Read Page, and the Confirm Page respectively, according to the mock-ups shown above. The only HTML that is output by your code, must be output in one of these four methods.
- [x] The h1 tag with Simple Text Editor in it on all pages should link back to the landing page.
- [x] On the landing page, the input text field should have Text File Name as a placeholder attribute.
- [x] On the landing page, if a user enters a file name which is empty, only white space characters, or has characters which are non-alpha numeric or space, then clicking create will take on back to the landing page.
- [x] On the landing page, if a user enters a non-empty, file name which consists of alphanumeric and space characters, they should be taken to the edit page, and the file name should appear in the h2 tag next to the words Edit:
- [x] Similarly, if a user clicks the edit button next to an existing file name they should be taken to the edit page. In this case, text from a previous edit session should be loaded.
- [x] Clicking the save button on the Edit Page should save the text in the textarea into the text_files subfolder of your web application's folder. The file name should be the file name that was given on the landing page followed by .txt. For example, the above Edit page would save to "A great story.txt".
- [x] The Return button on the Edit Page should just go to the landing page without saving the document.
- [x] If a user click on a link under my files, the user should go to a Read Page where the name of the file clicked should appear after Read in an h2 tag. Beneath this in a div tag should appear the contents of the file.
- [x] If a Delete button on the Landing Page is clicked, the user should be taken to a Confirm Delete Page. This should have the text as in the mock-up above except that the name of the file should correspond to the Delete button clicked.
- [x] Clicking Confirm on a Delete Page should delete the corresponding file and return the user to the Landing Page.
- [x] Clicking Cancel on a Delete Page should return the user to the Landing Page without deleting the file.
